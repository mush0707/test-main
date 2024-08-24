# Installation

## requirements

- docker
- minikube
- kubectl

``minikube start``

``docker build . -f docker/nginx.Dockerfile -t client-frontend:dev``

``docker build . -f docker/nginx.Dockerfile -t client-backend:dev``

``minikube image load client-backend:dev``

``minikube image load client-frontend:dev``

``kubectl apply -f ./k8s/``

``kubectl exec --stdin --tty web-application-main-[x]-[y]  -c fpm -- /bin/sh``

in shell:

``php artisan passport:client``

example after success:

``Client ID: 2``  

``Client secret: XChdmgt6UftBT6SjMkZ6q6P0MuHUxQDCaIRIoXQm``

Client info need to connected microservices (Reward microservice)


