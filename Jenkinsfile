pipeline {
    agent any
    stages {
        stage('Build') { 
            steps {
               git branch: 'main', credentialsId: '413a06e0-091b-4f7e-9864-e2f7cf2b4ae8', url: 'https://github.com/hossain109/SchoolManagement.git'
            }
        }
        stage('Test') { 
            steps {
              echo "Tested" 
            }
        }

    }
}
