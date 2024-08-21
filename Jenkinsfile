pipeline {
    agent any
    stages {
        stage('SCM Checkout') { 
            steps {
               git branch: 'main', credentialsId: 'github-jenkins', url: 'https://github.com/hossain109/SchoolManagement.git'
            }
        }
        stage('Build and Push Docker Image') { 
            steps{
                script {
                    withCredentials([usernamePassword(credentialsId: 'github-jenkins', usernameVariable: 'AKIA6ODU4YRFVGAHI6GH ', 
                    passwordVariable: 'DL3ERczMYxIp4b5jD3SD/4GeGTPgwFqscW748edO')]) {
                    sh "aws ecr get-login-password --region eu-west-3 | docker login --username AWS --password-stdin 992382600267.dkr.ecr.eu-west-3.amazonaws.com"
                    sh "docker build -t schoolmangement ."
                    sh "docker tag schoolmangement:latest 992382600267.dkr.ecr.eu-west-3.amazonaws.com/schoolmangement:latest"
                    sh "docker push 992382600267.dkr.ecr.eu-west-3.amazonaws.com/schoolmangement:latest"
                    }
                }
            }
        }
    }
}
