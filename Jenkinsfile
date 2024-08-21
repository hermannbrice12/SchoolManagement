pipeline {
    agent any
    stages {
        stage('SCM Checkout') { 
            steps {
               git branch: 'main', credentialsId: 'a01881d0-87b2-4ec7-8f11-5731cebfe0ea', url: 'https://github.com/hossain109/SchoolManagement.git'
            }
        }
        stage('Build and Push Docker Image') { 
            steps{
                script {
                    withCredentials([usernamePassword(credentialsId: 'jenkins-aws', usernameVariable: 'AKIA6ODU4YRF43XSR42A ', 
                    passwordVariable: 'H97AESUvyAEBfzUlYzgMZtYp0k1/8dk7+N5vXNCO')]) {
                    sh "aws ecr get-login-password --region eu-west-3 | docker login --username AWS --password-stdin 992382600267.dkr.ecr.eu-west-3.amazonaws.com"
                    sh "docker build -t schoolmanagement ."
                    sh "docker tag schoolmanagement:latest 992382600267.dkr.ecr.eu-west-3.amazonaws.com/schoolmanagement:latest"
                    sh "docker push 992382600267.dkr.ecr.eu-west-3.amazonaws.com/schoolmanagement:latest"
                    }
                }
            }
        }
    }
}
