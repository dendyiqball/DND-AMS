// ===========================
// DND-AMS
// ===========================

console.log("DND-AMS Loaded");

// Auto Close Alert

setTimeout(function(){

    let alert=document.querySelector(".alert");

    if(alert){

        alert.classList.remove("show");

    }

},3000);


// Confirm Delete

function confirmDelete(){

    return confirm("Yakin ingin menghapus data ini?");

}


// Preview Image

function previewImage(input,id){

    if(input.files && input.files[0]){

        let reader=new FileReader();

        reader.onload=function(e){

            document.getElementById(id).src=e.target.result;

        }

        reader.readAsDataURL(input.files[0]);

    }

}


// Scroll Top

window.addEventListener("scroll",function(){

    let btn=document.getElementById("topBtn");

    if(btn){

        if(window.scrollY>250){

            btn.style.display="block";

        }else{

            btn.style.display="none";

        }

    }

});


function topFunction(){

    window.scrollTo({

        top:0,

        behavior:"smooth"

    });

}