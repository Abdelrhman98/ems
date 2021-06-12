
    $(document).ready(()=>{
        $("#mySelect").change((event)=>{
            var name =event.target.files[0].name;
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#mySelect").clone().appendTo(".inputsHidden").addClass("none "+name)
            $(".imgsView").append(`
            <a onclick="removeImg('${name}')"><img src="${tmppath}" width="50" height="50"  class="${name}"/></a>
            `)

        });

    })
    function removeImg(id){
        elements = document.getElementsByClassName(id);
        for( i= elements.length-1;i >= 0;i--){
            elements[i].remove()
        }
    }
