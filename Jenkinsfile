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
                    withCredentials([usernamePassword(credentialsId: 'github-jenkins', usernameVariable: 'AKIA6ODU4YRF7UCSSK6K ', 
                    passwordVariable: 'dtc1GzGM8GAlz3svLbI6Y1U1bhEGSC7k1LIfMuHJ')]) {
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
