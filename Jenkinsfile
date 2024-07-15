pipeline {
    agent {
      label 'JenkinsNode'
    }
    stages {
        stage('Build') { 
            steps {
                git branch: 'main', credentialsId: '1fcc896d-2ac4-4e30-b9fd-97fe604549e2', url: 'https://github.com/hossain109/SchoolManagement.git'
            }
        }
        stage('Test') { 
            steps {
              echo "Tested" 
            }
        }

    }
}