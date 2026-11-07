window.addEventListener('DOMContentLoaded', function(){
    const lookupBtn= document.getElementById('lookup');
    lookupBtn.addEventListener('click',lookupCountry)
});
    function lookupCountry(event){
        event.preventDefault();

        const country = document.getElementById('country').value;
        const url= ('world.php?country='+encodeURIComponent(country));

        fetch(url)
        .then(function(response){
            return response.text();
        })
        .then (function(data){
            document.getElementById('result').innerHTML=data;
        })
        .catch(function(error){
            console.log(error);
        });

    }
        
 