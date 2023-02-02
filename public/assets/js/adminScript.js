$(document).ready(()=> {
    // hamburger on admin
    $("#hamburgerAdmin").click(()=> {
        if($("#navBarAd").hasClass("open")){
            document.getElementById("navBarAd").style.marginLeft = "0%"
            $("#navBarAd").removeClass("open")
        }
        else {
            document.getElementById("navBarAd").style.marginLeft = "-100%"
            $("#navBarAd").addClass("open")
        }
    })

    // fixing the weird bug of hamburger menu not defaulting when screen size changes
    $(window).resize(function() {
        if ($(window).width() >= 1024) {
            if($('#navBarAd').css('margin-left', '-100%')){
                $('#navBarAd').css('margin-left', '0')
            }
        }
    });

    $('addStudentOfficerForm').on('submit', function(e) {
      e.preventDefault()
    })

    
})

// validate form for admin settings page

// validate form for admin accounts page




positionInputPrefix = "<span class = 'flex relative items-center w-full'>"
inputContent1 = "<input type='text' name='positionName[]' placeholder='Enter position name' class='positionField pr-20 w-full border-1 mb-2 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0' required>"
inputContent2 = "<button class = 'absolute right-2 top-0 bottom-2 my-2 rounded-md text-white text-sm px-2 bg-red-600 hover:bg-red-800' onclick='return this.parentNode.remove()'>Delete</button>"
positionInputSuffix = "</span>"

function addPosition(element) {
  spanID = element.previousElementSibling.id
  content = `${positionInputPrefix} ${inputContent1} ${inputContent2} ${positionInputSuffix}`
  $(`#${spanID}`).append(content)
}
// Fetch all the details element.
const details = document.querySelectorAll("details");

// Add the onclick listeners.
details.forEach((targetDetail) => {
  targetDetail.addEventListener("click", () => {
    // Close all the details that are not targetDetail.
    details.forEach((detail) => {
      if (detail !== targetDetail) {
        detail.removeAttribute("open");
      }
    });
  });
});

// enable/disable edit on settings
function editInfoToggle(element){
  prevId = element.previousElementSibling.id
  inputEditable = document.getElementById(prevId)
  inputEditable.disabled = false
  inputEditable.style.borderColor = "green"
  element.style.display = "none";
}
// view election donut chart
function donutChart(element){
  
  const dataDoughnut = {
    labels: ["Total Voters", "Voted"],
    datasets: [
      {
        label: "My First Dataset",
        data: [300, 50],
        backgroundColor: [
          "rgb(133, 105, 241)",
          "rgb(164, 101, 241)",
        ],
        hoverOffset: 2,
      },
    ],
  };
  const configDoughnut = {
    type: "doughnut",
    data: dataDoughnut,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById(element),
    configDoughnut
  );
}


function selectAll(e){
  selected = document.getElementsByName('selected');
  if(e.checked){
    for(i = 0; i < selected.length; i++){
      if(!selected[i].checked){
        selected[i].checked = true;
      }
    };
  }
  else{
    for(i = 0; i < selected.length; i++){
      if(selected[i].checked){
        selected[i].checked = false;
      }
    }
  }
 selectOne();
}

function selectOne(){
  inputs = document.querySelectorAll(".multiSelectInputs");
  selected = document.getElementsByName('selected');
  multiSelect = document.querySelector("#multiSelect");
  operations = document.querySelector("#operations");
  thead = document.querySelector("#thead");
  detail = document.querySelectorAll(".details");

  inputElementPref = "<input name='id[]' type='hidden' value='";
  inputElementSuff = "'>";
  content = "";
  for(i = 0; i < selected.length; i++){
    if(selected[i].checked){
      content += inputElementPref + selected[i].value + inputElementSuff;
    }
  }
  inputs.forEach(input => {
    input.innerHTML = content
  })

  for(i = 0; i < selected.length; i++){
    if(selected[i].checked){
      multiSelect.classList.remove("hidden");
      operations.classList.add("hidden");
      thead.style.backgroundColor = "rgb(251, 213, 213)";
      for(i = 0; i < detail.length; i++){
        detail[i].classList.add("hidden");
      }
    return 0;
    }
  }   
  thead.style.backgroundColor = "white";
  operations.classList.remove("hidden"); 
  multiSelect.classList.add("hidden");
  document.getElementById("selectAll").checked = false;
  for(i = 0; i < detail.length; i++){
    detail[i].classList.remove("hidden");
  }
}

