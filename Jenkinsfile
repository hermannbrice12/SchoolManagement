pipeline {
    agent any
    
    environment {
        AWS_REGION = 'us-west-3'
        ECR_REPO = 'schoolmanagement'
        AWS_ACCOUNT_ID = '992382600267'
        URL_REGISTRY = "${AWS_ACCOUNT_ID}.dkr.ecr.${AWS_REGION}.amazonaws.com"
    }
    
    stages { 
        stage('SCM Checkout') {
            steps {
                git branch: 'main', credentialsId: 'd9cc1183-2e7d-4b61-92ad-7416c74a1e61', url: 'https://github.com/hossain109/SchoolManagement.git'
            }
        }
        
        stage('Build and Push Docker Image') {
            steps {
                script {
                    // withCredentials([usernamePassword(credentialsId: 'jenkins-aws', usernameVariable: 'AKIA6ODU4YRF43XSR42A ', passwordVariable: 'H97AESUvyAEBfzUlYzgMZtYp0k1/8dk7+N5vXNCO')]) {
                    //     // Login to ECR
                    //     sh "aws ecr get-login-password --region ${AWS_REGION} | docker login --username AWS --password-stdin ${URL_REGISTRY}"

                    //     // Build Docker image
                    //     sh "docker build -t $ECR_REPO ."

                    //     // Tag Docker image
                    //     sh "docker tag $ECR_REPO:latest ${URL_REGISTRY}/$ECR_REPO:latest"

                    //     // Push Docker image to ECR
                    //     sh "docker push ${URL_REGISTRY}/$ECR_REPO:latest"
                    aws ecr get-login-password --region eu-west-3 | docker login --username AWS --password-stdin 992382600267.dkr.ecr.eu-west-3.amazonaws.com
                    docker build -t schoolmanagement .
                    docker tag schoolmanagement:latest 992382600267.dkr.ecr.eu-west-3.amazonaws.com/schoolmanagement:latest
                    docker push 992382600267.dkr.ecr.eu-west-3.amazonaws.com/schoolmanagement:latest
                    }
                }
            }
        }
    }
}