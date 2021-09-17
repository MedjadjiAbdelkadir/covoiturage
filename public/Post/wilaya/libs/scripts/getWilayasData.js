
function getWilayas (){
    fetch('https://mezianekhalil.github.io/wilyatDzFetch/public/libs/json/wilayas.json')
    .then(response =>{
        return response.json()
    })
    .then(wilayas =>{
        setWilayas(wilayas)
    })
    .catch(err=>{
        console.log(err)
    })
}
window.addEventListener('load',()=>{
    getWilayas()
})
const stateField = document.getElementById('state')
const stateField_End = document.getElementById('state_End')

function setWilayas(wilayas){
    for(let key in wilayas){
        createOption(wilayas[key])
    }
}

function createOption(state){
    let option = document.createElement('option')
    let wilaya = document.createTextNode(state.name)
    option.appendChild(wilaya)
    let municipal = []
    for(let key in state.communes){
        municipal.push(state.communes[key].name)
    }
    option.setAttribute('data-municipal',municipal)
    option.setAttribute('value',state.name)
    stateField.appendChild(option)
    stateField_End.appendChild(option)
}

const municipal = document.getElementById('municipal')
const municipal_End = document.getElementById('municipal_End')

stateField.addEventListener('change',()=>{
    let municipals = stateField.options[stateField.selectedIndex].dataset.municipal.split(',')
    municipals.forEach(item => {
        deleteOptions()
        setTimeout(() => {
            setMunicipal(item)
            municipal.options[0].selected = "selected"
        }, 0);
    });
})
function setMunicipal(municipalValue){
    let option = document.createElement('option')
    let municipalItem = document.createTextNode(municipalValue)
    option.appendChild(municipalItem) 
    option.setAttribute('value',municipalValue)
    municipal.appendChild(option)
    municipal_End.appendChild(option)
}
function deleteOptions(){
    for(let i = 1; i <= municipal.options.length - 1;i++){
        municipal.options.remove(i)
    }
}


// ---------------------------------------------------------------//
