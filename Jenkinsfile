pipeline {
    agent any
    environment {
        AWS_REGION = 'eu-west-3'
        ECR_REPO = 'schoolmanagement'
        AWS_ACCOUNT_ID = '992382600267'
        URL_REGISTRY = "${AWS_ACCOUNT_ID}.dkr.ecr.${AWS_REGION}.amazonaws.com"
        CLUSTER_NAME='schoolmanagement-cluster'
        SERVICE_NAME='my-service'
        TASK_DEFINITION='schoolmanagement-task'
    }
    
    stages { 
        stage('SCM Checkout') {
            steps {
                git branch: 'main', credentialsId: '992382600267', url: 'https://github.com/hossain109/SchoolManagement.git'
            }
        }
        stage('Code Test') {
            steps {
                echo 'Running Code Tests...'
                // Assurez-vous que PHPUnit est installé projet
                sh './vendor/bin/phpunit --testdox'
            }
        }
        stage('Build and Push Docker Image') {
            steps {
                script {
                        // Login to ECR
                        sh "aws ecr get-login-password --region ${AWS_REGION} | docker login --username AWS --password-stdin ${URL_REGISTRY}"

                        // Build Docker image
                        sh "docker build -t $ECR_REPO ."

                        // Tag Docker image
                        sh "docker tag $ECR_REPO:latest ${URL_REGISTRY}/$ECR_REPO:latest"

                        // Push Docker image to ECR
                        sh "docker push ${URL_REGISTRY}/$ECR_REPO:latest"
                }
            }
        }
        stage('Deploy to AWS Fargate') {
            steps {
                script {
                    // Mise à jour de la définition de tâche et du service ECS en une seule commande
                    sh """
                    aws ecs update-service \
                        --cluster ${CLUSTER_NAME} \
                        --service ${SERVICE_NAME} \
                        --task-definition ${TASK_DEFINITION} \
                        --force-new-deployment \
                        --region ${AWS_REGION}
                    """
                }
            }
        }

    }
}
