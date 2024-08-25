
    function loadfile(e){
        // console.log(e);
        
        let reader = new FileReader();

        console.log(reader);

        reader.onload = function(){
            let output = document.getElementById('output');
            // console.log(reader.result);
            output.src = reader.result;
        }

        // console.log(event.target.files[0]);
        reader.readAsDataURL(event.target.files[0]);
    };