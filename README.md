

## Build the application container 
  
  This is a sample php application based on the project, https://github.com/taniarascia/pdo/
Container image location: https://cloud.docker.com/repository/docker/mgtns/kubernetes-repo/general    

```  
cd application-container
docker build . -t app
push the container to a registry
```
  
  
  
  
## Create database  
  
```
cd mysql 
kubectl create -f mysql-pv.yaml
kubectl create -f mysql-pvc.yaml
kubectl create -f mysql-deployment.yaml
kubectl create -f mysql-service.yaml
```  
  
  
  
  
## Database Backup  
  
  
```
kubectl create -f backup-cronjob.yaml
```  
  
  
  
  
  
## Deploy on kubernetes
  
  
  Application will be avaliable on 30080 as a NodePort Service
  
```  
kubectl create -f app-deployment.yaml  
kubectl create -f app-service.yaml  
```  
  
  
  
  
## Scaling
  
  Application will be scalled upon the cpu utilization.
  
```
kubectl create -f app-scaling.yaml
```  
  
  
  
  
## Rolling update
  
change the container image to the newer version in rolling-deployment.yaml
  

```
kubectl replace -f rolling-deplyment.yaml
```
  
  
  
  
## Centralized logs  
  
application containers are writing logs to stdout and std error.
logs can be centrally accessed via running a timber.io daemonset.
  
```
kubectl create secret generic timber --from-literal=timber-api-key=<timber_api_key>
kubectl apply -f https://raw.githubusercontent.com/timberio/agent/master/support/scripts/kubernetes/
		timber-agent-daemonset.yaml
```
  
  
  
  
## Monitoring and Alerts
  
  Monitoring can be setup on timber.io 
  
  