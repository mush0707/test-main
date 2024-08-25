## requirements

- docker
- minikube
- kubectl

# Installation

``cp .env.example .env``

``minikube start``

``docker build . -f docker/nginx.Dockerfile -t client-frontend:50``

``docker build . -f docker/fpm.Dockerfile -t client-backend:50``

``minikube image load client-backend:50``

``minikube image load client-frontend:50``

``kubectl apply -f ./k8s/``

``kubectl exec --stdin --tty web-application-main-[x]-[y]  -c fpm -- /bin/sh``

in shell:

``php artisan passport:client``

example after success:

``Client ID: 2``  

``Client secret: XChdmgt6UftBT6SjMkZ6q6P0MuHUxQDCaIRIoXQm``

API documentation <a href="http://192.168.49.2:30009/api/documentation">Swagger documentation</a>


