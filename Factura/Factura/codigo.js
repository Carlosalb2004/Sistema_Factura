$('#formLogin').submit(function(e){
    e.preventDefault();
    var username = $.trim($("#username").val());    
    var password =$.trim($("#password").val());    
     
    if(username.length == "" || password == ""){
       Swal.fire({
           type:'warning',
           title:'Debe ingresar un usuario y/o password',
       });
       return false; 
     }else{
         $.ajax({
            url:"BD/validate.php",
            type:"POST",
            datatype: "json",
            data: {username:username, password:password}, 
            success:function(data){               
                if(data == "null"){
                    Swal.fire({
                        type:'error',
                        title:'Usuario y/o password incorrecta',
                    }).then((result) => {
                        if(!result.value){
                            //window.location.href = "vistas/pag_inicio.php";
                            window.location.href = "Fronted/hom1e.php";
                        }
                    });
                }else{
                    Swal.fire({
                        type:'success',
                        title:'¡Conexión exitosa!',
                        confirmButtonColor:'#3085d6',
                        confirmButtonText:'Ingresar'
                    }).then((result) => {
                        if(result.value){
                            //window.location.href = "vistas/pag_inicio.php";
                            window.location.href = "Fronted/home.php";
                        }
                    })
                    
                }
            }    
         });
     }     
 });
// // Obtener todos los botones con clase compra
// const compras = document.querySelectorAll('.iniciarsession');

// // Crear función para mostrar alerta
// function comprar(e) {
//     Swal.fire({
//         title: 'Realizar compra!',
//         text: 'Haz click en el boton!',
//         icon: 'success',
//         confirmButtonText: 'Aceptar'
//     // Encadena la promesa para saber lo que pasó en la ventana modal
//     })
//     .then(resp => {
//         if(resp.isConfirmed) {
//             // El usuario hizo clic en el botón aceptar
//             // Necesitas agregar información adicional en alguna parte
//             console.log(img.alt);
//         } else {
//             // El usuario cerró la ventana modal sin hacer clic en el botón aceptar
//         }
//     }
//     );;
//     // e.target es el botón que recibió clic
//     // Necesitas acceder a la imagen para tomar los datos desde ahí
//     // let img = e.target.previousElementSibling;
//     // Swal.fire({
//     //     title: 'Realizar compra!',
//     //     text: 'Haz click en el boton!',
//     //     icon: 'success',
//     //     confirmButtonText: 'Aceptar'
//     // // Encadena la promesa para saber lo que pasó en la ventana modal
//     // })
//     // .then(resp => {
//     //     if(resp.isConfirmed) {
//     //         // El usuario hizo clic en el botón aceptar
//     //         // Necesitas agregar información adicional en alguna parte
//     //         console.log(img.alt);
//     //     } else {
//     //         // El usuario cerró la ventana modal sin hacer clic en el botón aceptar
//     //     }
//     // }
//     // );;
// }

// // Recorrer botones para asignar función
// compras.forEach(btn => btn.addEventListener('click', comprar));

// $('#formLogin').submit(function(e){
//     e.preventDefault();
//     var usuario = $.trim($("#usuario").val());    
//     var password =$.trim($("#password").val());    
     
//     if(usuario.length == "" || password == ""){
//        Swal.fire({
//            type:'warning',
//            title:'Debe ingresar un usuario y/o password',
//        });
//        return false; 
//      }else{
//          $.ajax({
//             url:"bd/login.php",
//             type:"POST",
//             datatype: "json",
//             data: {usuario:usuario, password:password}, 
//             success:function(data){               
//                 if(data == "null"){
//                     Swal.fire({
//                         type:'error',
//                         title:'Usuario y/o password incorrecta',
//                     });
//                 }else{
//                     Swal.fire({
//                         type:'success',
//                         title:'¡Conexión exitosa!',
//                         confirmButtonColor:'#3085d6',
//                         confirmButtonText:'Ingresar'
//                     }).then((result) => {
//                         if(result.value){
//                             //window.location.href = "vistas/pag_inicio.php";
//                             window.location.href = "dashboard/index.php";
//                         }
//                     })
                    
//                 }
//             }    
//          });
//      }     
//  });