<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Usuarios con Sidebar</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <style>
         .sidebar {
         height: 100%;
         width: 0;
         position: fixed;
         z-index: 1;
         top: 0;
         right: 0;
         background-color: #f8f9fa;
         overflow-x: hidden;
         transition: 0.5s;
         padding-top: 60px;
         padding-left: 25px;
         }
         .sidebar a {
         padding: 10px 15px;
         text-decoration: none;
         font-size: 25px;
         color: #111;
         display: block;
         transition: 0.3s;
         }
         .sidebar a:hover {
         color: #343a40;
         }
         .sidebar .closebtn {
         position: absolute;
         top: 0;
         right: 25px;
         font-size: 36px;
         margin-left: 50px;
         }
         .loader-overlay {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.5);
         display: none;
         justify-content: center;
         align-items: center;
         z-index: 9999;
         }
         .loader {
         border: 8px solid #f3f3f3;
         border-top: 8px solid #3498db;
         border-radius: 50%;
         width: 60px;
         height: 60px;
         animation: spin 2s linear infinite;
         }
         @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
         }
      </style>
   </head>
   <body>
      <br>
      <div class="container mt-12">
         <h2>Gestión de usuarios laravel</h2>
         <br>
         <button class="btn btn-primary mb-3" onclick="openForm()">Crear Usuario</button>
         <div class="row">
            <div class="col-12">
               <div class="container mt-5">
                  <table class="table">
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Nombre de Usuario</th>
                           <th scope="col">Apellido</th>
                           <th scope="col">Email</th>
                           <th scope="col">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($datos as $dato)
                        <tr>
                           <th scope="row">{{$dato->id}}</th>
                           <td>{{$dato->nombre}}</td>
                           <td>{{$dato->apellido}}</td>
                           <td>{{$dato->correo}}</td>
                           <td>
                              <button class="btn btn-warning btn-sm" onclick='openForm(@json($dato))'>Actualizar</button>
                              <button class="btn btn-danger btn-sm" onclick='confirmarEliminacion(@json($dato))'>Eliminar</button>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div id="mySidebar" style="background: #e7e7e7;" class="sidebar">
         <a href="javascript:void(0)" class="closebtn" onclick="closeForm()">×</a>
         <div class="container mt-5">
            <div class="card-body">
               <h3 class="card-title text-center">Regístratar usuario</h3>
               <form id="formularioRegistro">
                  <div hidden class="form-group">
                     <input type="text" class="form-control" id="idUsuario" placeholder="Introduce tu nombre de usuario">
                  </div>
                  <div class="form-group">
                     <label for="nombreUsuario">Nombre de usuario</label>
                     <input type="text" class="form-control" id="nombreUsuario" placeholder="Introduce tu nombre de usuario">
                  </div>
                  <div class="form-group">
                     <label for="apellido">Apellido</label>
                     <input type="text" class="form-control" id="apellido" placeholder="Introduce tu apellido">
                  </div>
                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" id="email" placeholder="Introduce tu email">
                  </div>
                  <div class="form-group">
                     <label for="password">Contraseña</label>
                     <input type="password" class="form-control" id="password" placeholder="Contraseña">
                  </div>
                  <button type="submit" onclick="registrar(event)" class="btn btn-primary">Aceptar</button>
               </form>
            </div>
         </div>
      </div>
      <div id="loader" class="loader-overlay">
         <div class="loader"></div>
      </div>
      <script
         src="https://code.jquery.com/jquery-3.7.1.min.js"
         integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
         crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
      <script>
         window.onload = function() {
             let welcome = window.localStorage.getItem('welcomewindow');
             if(welcome){
                 return;
             }

                  window.localStorage.setItem('welcomewindow', false);
                 Swal.fire({
                     title: '¡Bienvenido!',
                     text: 'Al sistema de gestión de usuarios de Laravel by @DavidRodriguez',
                     imageUrl: 'https://cdn.pixabay.com/photo/2016/08/16/10/18/dragon-1597583_960_720.png',
                     imageWidth: 200,
                     imageHeight: 200,
                     imageAlt: 'Logo',
                     confirmButtonColor: '#3085d6',
                     confirmButtonText: 'Continuar'
                 });
             }

         function openForm(data) {
             if(!data){
                 document.getElementById('nombreUsuario').value = '';
                 document.getElementById('idUsuario').value = '';
                 document.getElementById('apellido').value = '';
                 document.getElementById('email').value = '';
                 document.getElementById('password').value = '';
                 return document.getElementById("mySidebar").style.width = "450px";
             }
             document.getElementById("mySidebar").style.width = "450px";
             document.getElementById('nombreUsuario').value = data.nombre;
             document.getElementById('idUsuario').value = data.id;
             document.getElementById('apellido').value = data.apellido;
             document.getElementById('email').value = data.correo;
             document.getElementById('password').value = data.clave;
         }

         function closeForm() {
             document.getElementById("mySidebar").style.width = "0";
         }

         function registrar(e){
             showLoader();
             e.preventDefault();
             let nombre = document.getElementById('nombreUsuario').value;
             let apellido = document.getElementById('apellido').value;
             let email = document.getElementById('email').value;
             let password = document.getElementById('password').value;
             let id = document.getElementById('idUsuario').value;
             let url = id ? `/usuario/${id}` : '/usuario';
             let method = id ? 'PUT' : 'POST';

             $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 url,
                 method,
                 data: {
                     nombre,
                     apellido,
                     correo: email,
                     clave: password
                 },
                 success: function(response){
                     location.reload();
                 },
                 error: function(err){
                     location.reload();
                 }
                 ,finally: function(){
                     hideLoader();
                 }
             });
         }


         function confirmarEliminacion(user){
             Swal.fire({
                 title: 'Eliminar usuario',
                 text: `¿Estás seguro de eliminar a ${user.nombre} ${user.apellido}?`,
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Sí, eliminar'
             }).then((result) => {
                 if (result.isConfirmed) {
                     deleteusr(user.id);
                 }
             });
         }


         function deleteusr(id){
             showLoader();
             $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: '/usuario',
                 method: 'DELETE',
                 data: {
                     id
                 },
                 success: function(response){
                     location.reload();
                 },
                 error: function(err){
                     location.reload();
                 },
                 finally: function(){
                     hideLoader();
                 }
             });
         }

         function showLoader() {
             document.getElementById('loader').style.display = 'flex';
         }

         function hideLoader() {
             document.getElementById('loader').style.display = 'none';
         }
      </script>
   </body>
</html>
