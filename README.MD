# Développer et Déployer une application PHP avec Docker et Kubernetes

## Docker

### Build de l'application
```bash
docker build -t hadv83/php-app:v1 -f php-app/docker/Dockerfile .
```

### Run en local de l'application
```bash
docker compose -f php-app/docker/docker-compose.yml up 
```

### Push sur la registry docker hub
```bash
docker push hadv83/php-app:v1
```

## Kubernetes


### Créer un namespace
```bash
kubectl create namespace php-app
```

### Déployer l'application avec Kubectl
```bash
kubectl apply -f php-app/kubernetes
```

### Déployer une base de donnée avec Helm

Voir la documentation de Percona XtradB : https://docs.percona.com/percona-operator-for-mysql/pxc/helm.html#pre-requisites

Voir la documentation d'adminer : https://artifacthub.io/packages/helm/mogaal/adminer

### Déployer via helm son appliction

```bash
helm install mon-application-php ./php-helm -f ./php-helm/values.yaml
```

### Supprimer l'application via helm

```bash
helm uninstall mon-application-php
```

### Upgrade de l'application via helm

```bash
helm upgrade mon-application-php ./php-helm -f ./php-helm/values.yaml
```
