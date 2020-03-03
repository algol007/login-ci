$(document).on("click", ".open-editMenu", function() {
  var id = $(this).data("id");
  var menu = $(this).data("menu");
  //   alert(menuId);
  $(".modal-body #id").val(id);
  $(".modal-body #menu").val(menu);
});

$(document).on("click", ".open-editSubmenu", function() {
  var id = $(this).data("id");
  var title = $(this).data("title");
  var menu = $(this).data("menu");
  var url = $(this).data("url");
  var icon = $(this).data("icon");
  // console.log(title);
  // alert(title);
  //
  $(".modal-body #id").val(id);
  $(".modal-body #title").val(title);
  $(".modal-body #menu_id").val(menu);
  $(".modal-body #url").val(url);
  $(".modal-body #icon").val(icon);
});

// function onDeleteMenu(id) {
//   Swal.fire({
//     title: "Are you sure?",
//     text: "You won't be able to revert this!",
//     icon: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     confirmButtonText: "Yes, delete it!"
//   }).then(result => {
//     if (result.value) {
//       Swal.fire({
//         icon: "success",
//         title: "Your work has been deleted",
//         timer: 2000,
//         showConfirmButton: false,
//         onClose: () => {
//           window.location.replace(
//             "http://localhost/login-ci/menu/delete/" + id
//           );
//         }
//       });
//     }
//   });
// }
