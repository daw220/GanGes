/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


'use strict'

        function inicio(){

            let sel = document.getElementById('select-location');
            sel.addEventListener('change', (e) = > {

                fetch(`http://localhost/AgriculturaDePrecision/lib/parseo.php?id2=${sel.value}`)
                .then(response = > response.text())
                .then(resultado = > buscarJson(resultado))
                .catch((err) = > {console.log(err)});
            });
        }

        function buscarJson(parPol) {

        let con = document.getElementById('con');
                con.innerHTML = "";
                let map = document.createElement('div');
                map.id = "map";
                con.appendChild(map);
                if (parPol != "1")
        {
        let sel = document.getElementById('select-location');
                fetch(`../AgriculturaDePrecision/geojson / ${parPol} - Recinto.geojson`)
                .then(response = > response.json())
                .then(resultado = > cambioCor(resultado))
                .catch((err) = > {console.log(err)})
        }

        }



        function cambioCor(json)
        {
        let map1 = document.getElementById('map');
                let coor = json.features[0].geometry.coordinates;
                let todo = [];
                var map = L.map('map').setView(coor[0][0].sort(function(a, b){return b - a; }), 17);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
                for (let i = 0; i < coor[0].length; i++)
        {
        let aux = coor[0][i];
                aux.sort(function(a, b) {

                return b - a;
                });
                todo.push(aux);
        }

        let poligono = L.polygon(todo).addTo(map);
        }


        window.onload = inicio;