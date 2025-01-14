const MongoClient = require("mongodb").MongoClient;
const bodyParser = require("body-parser");
const express = require("express");
const app = express();
const port = 3000;
const cors = require("cors");
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
const url = "mongodb://localhost/";
var db;

MongoClient.connect(url, function (err, client) {
  db = client.db("casino");
  if (!err) console.log("DB");
});

app.post("/signUp", (req, res) => {
  if (req.body.Email != "" && req.body.Password != "") {
    db.collection("usuarios").findOne(
      { Email: req.body.Email },
      function (findErr, result) {
        if (findErr) throw findErr;
        if (result) {
          console.log("usuario ya existe");
          return res.send("Usuario ya existe");
        } else {
          let date = new Date();
          let day = date.getDate();
          let month = date.getMonth() + 1;
          let year = date.getFullYear();
          if (month < 10) {
            if (day < 10) {
              var fecha = "0" + day + "-0" + month + "-" + year;
            } else {
              var fecha = day + "-0" + month + "-" + year;
            }
          } else {
            if (day < 10) {
              var fecha = "0" + day + "-" + month + "-" + year;
            } else {
              var fecha = day + "-" + month + "-" + year;
            }
          }

          db.collection("usuarios").insertOne({
            Email: req.body.Email,
            Password: req.body.Password,
            Saldo: 10000,
          });
          db.collection("apuestas").insertOne({
            Email: req.body.Email,
            time: fecha,
            Descripción: "Regalo inicial de creditos",
            Transaccion: 10000,
          });
          console.log("usuario creado");
          return res.send("usuario creado");
        }
      }
    );
  }
});

app.post("/login", (req, res) => {
  console.log("corriendo");
  db.collection("usuarios").findOne(
    { Email: req.body.Email, Password: req.body.Password },
    function (findErr, result) {
      if (findErr) throw findErr;
      if (result) {
        res.status(200).send(result);
        console.log(result.Email);
      } else {
        res.status(500).send("usuario y/o contraseña incorrecta");
      }
    }
  );
});

app.get("/historial/:id", (req, res) => {
  console.log("empieza");
  db.collection("apuestas")
    .find(
      { Email: req.params.id },
      {
        projection: {
          _id: 1,
          Email: 1,
          time: 1,
          Descripción: 1,
          Transaccion: 1,
        },
      }
    )
    .toArray(function (err, result) {
      if (err) throw err;
      if (result) {
        console.log("si funciono historial");
        res.send(result);
      }
    });
});

app.get("/fondos/:id", (req, res) => {
  console.log("empieza obt datos");
  db.collection("usuarios")
    .find(
      { Email: req.params.id },
      {
        projection: {
          _id: 1,
          Email: 1,
          Saldo: 1,
        },
      }
    )
    .toArray(function (err, result) {
      if (err) throw err;
      if (result) {
        console.log("lo encontro");
        res.send(200, result[0].Saldo);
      }
    });
});

app.post("/fondos", (req, res) => {
  console.log("empieza carga fondo");
  var integer = parseInt(req.body.Agregarsaldo, 10);
  db.collection("usuarios").updateOne(
    { Email: req.body.Email },
    { $inc: { Saldo: integer } },
    function (err, result) {
      if (err) throw err;
      if (result) res.status(200).send("Agregado " + req.body.AgregarSaldo);
    }
  );
  db.collection("apuestas").insertOne({
    Email: req.body.Email,
    time: fecha,
    Descripción: "Compra creditos",
    Transaccion: integer,
  });
});

app.get("/apostar", (req, res) => {
  let date = new Date();
  let day = date.getDate();
  let month = date.getMonth() + 1;
  let year = date.getFullYear();

  db.collection("usuarios").findOne(
    { Email: req.body.Email },
    function (err, result) {
      if (err) throw err;
      if (result) {
        if (result["Saldo"] - req.body.CantApuesta < 0) {
          console.log("Saldo insuficiente");
          res.send("Saldo insuficiente");
          return "Saldo insuficiente";
        } else {
          if (month < 10) {
            if (day < 10) {
              var fecha = "0" + day + "-0" + month + "-" + year;
            } else {
              var fecha = day + "-0" + month + "-" + year;
            }
          } else {
            if (day < 10) {
              var fecha = "0" + day + "-" + month + "-" + year;
            } else {
              var fecha = day + "-" + month + "-" + year;
            }
          }
          const random = Math.floor(Math.random() * 38);
          console.log(random);
          console.log(req.body.NumeroApuesta);

          if (req.body.NumeroApuesta == random) {
            const ganador = req.body.CantApuesta * 36 - req.body.CantApuesta;
            console.log("gano");
            db.collection("apuestas").insertOne({
              Email: req.body.Email,
              time: fecha,
              Descripción: "Gano en la ruleta",
              Transaccion: ganador,
            });
            db.collection("usuarios").updateOne(
              { Email: req.body.Email },
              { $inc: { Saldo: ganador } },
              function (err, result) {
                if (err) throw err;
                if (result) res.send("usuario " + req.body.Email + " gano");
              }
            );
          } else {
            console.log("perdio");
            db.collection("apuestas").insertOne({
              Email: req.body.Email,
              time: fecha,
              Descripción: "Perdio en la ruleta",
              Transaccion: -req.body.CantApuesta,
            });
            db.collection("usuarios").updateOne(
              { Email: req.body.Email },
              { $inc: { Saldo: -req.body.CantApuesta } },
              function (err, result) {
                if (err) throw err;
                if (result) res.send("usuario " + req.body.Email + " perdio");
              }
            );
          }
        }
      }
    }
  );
});

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`);
});
