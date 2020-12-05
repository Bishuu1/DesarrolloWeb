const { timeStamp } = require('console');
const express = require('express');
const app = express();
app.use(bodyParser());
const port = 3000
const MongoClient = requiere('mongodb').MongoClient;
const url = "mongo://localhost/";
var db;
MongoClient.connect(url, function(err, client){
  db = client.db('casino');
  if(!err)
  console.log("DB");
});

app.post('/signUp', (req, res) => {
if(req.body.Email != "" && req.body.Password != "" ){
  const login = db.collection('usuarios').findOne({Email:req.body.Email },function(findErr, result){
    if (findErr) throw findErr;
    if (login){
        return res.send('Usuario ya existe')
    }else{
        db.collection('usuarios').insertOne({Email:req.body.Email, Password:req.body.Password});
        db.collection('apuestas').insertOne({Email:req.body.Email, time: Date("d-m-Y"), Descripción: "Regalo inicial de creditos", Transaccion:10000});
    }
  })
}});

app.post('/login', (req, res) => {
    const login = db.collection('usuarios').findOne({Email:req.body.Email, Password:req.body.Password },function(findErr, result){
        if(findErr) throw findErr;
        if(login){
            res.send(200, result);
            console.log(result.Email);
        }else{
            return res.send(500);}   
    })
});

app.get('/historial', (req, res) => {
  db.collection('apuestas').findOne({Email: req.body.Email}, function(findErr, result){
      if(findErr) throw findErr;
      if(result){
          res.send(200, result);
      }
  })
})
app.get('/apostar', (req, res) => {
  
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})