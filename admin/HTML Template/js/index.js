// for adding input for product information 
//<label class="font-dark font-size-16 font-calibri mt-3">Add Product detail</label><br>
var i = 1;
function addinfo(){
    
    add_input = document.getElementById('place_input');
    add_file = document.getElementById('place_file');
    add_color = document.getElementById('place_color');

    label = document.createElement("label");
    label.setAttribute("class", "font-dark mt-3");
    label.innerHTML = "RAM "+(i);

    labelf = document.createElement("label");
    labelf.setAttribute("class", "font-dark mt-3");
    labelf.innerHTML = "image "+(i);

    labelc = document.createElement("label");
    labelc.setAttribute("class", "font-dark mt-3");
    labelc.innerHTML = "color "+(i);

    file = document.createElement("input");
    file.setAttribute("type", "file");
    file.setAttribute("class", "bg-dark form-control");
    file.setAttribute("name", "image"+(i));
    
    elem = document.createElement("input");
    elem.setAttribute("type", "text");
    elem.setAttribute("name", "ram"+(i));
    elem.setAttribute("class", "form-control");

    color = document.createElement("input");
    color.setAttribute("type", "text");
    color.setAttribute("name", "color"+(i));
    color.setAttribute("class", "form-control");
    
    
    add_input.appendChild(label);
    add_input.appendChild(elem);
    add_file.appendChild(labelf);
    add_file.appendChild(file);
    add_color.appendChild(labelc);
    add_color.appendChild(color);

    i++;
}

// graph for sales progress 
var SalesProChart = document.getElementById('SalesProChart').getContext("2d");

var spchart = new Chart(SalesProChart,{
    type: 'doughnut',
    data:{
         labels: ['Sumsong', 'Redmi', 'Apple'],
         datasets:[{
             label: "sells",
             data:[
                 122, 
                 233, 
                 655
             ],
             backgroundColor: [
                 '#19e7da',
                 '#55ecb2', 
                 '#b050d1'
             ]
         }]
    },
    options:{}
});

// graph for wise sales 

var wiseSalesChart = document.getElementById('wiseSalesChart').getContext("2d");

var wschart = new Chart(wiseSalesChart,{
    type: 'bar',
    data:{
        labels: ["January","February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets:[{
            label: "Your Wise Sales",
            data:[ 
                1001,
                4100,
                3345,
                5094,
                993,
                1234,
                1231,
                2989,
                4999,
                554,
                1244,
                5442
            ],
            backgroundColor: [
                '#fe7379',
                '#f54ea1',
                '#b050d1',
                '#6078ea',
                '#19e7da'
            ]
        }]
    },
    options:{
        layout:{
            height: 300 
        }
    }
})

