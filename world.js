window.addEventListener('DOMContentLoaded', function(){
    const lookupBtn= document.getElementById('lookup');
    const lookupCitiesBtn=document.getElementById('lookup-cities')

    lookupBtn.addEventListener('click',lookupCountry)
    lookupCitiesBtn.addEventListener('click',lookupCities);
});
    function lookupCountry(event){
        event.preventDefault();
        const country = document.getElementById('country').value;
        const url= ('world.php?country='+encodeURIComponent(country));
        showResults(url);
    }
     function lookupCities(event){
        event.preventDefault();
        const country = document.getElementById('country').value;
        const url= ('world.php?country='+encodeURIComponent(country)+'&lookup=cities');
        showResults(url);
     }
     function showResults(url){
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
        
 