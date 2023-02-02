
// display total votes vs total voters
function OGETotalVoters(labelSet,dataSet){
    const dataPie = {
        labels: labelSet,
        datasets: [
          {
            label: "My First Dataset",
            data: dataSet,
            backgroundColor: [
              "#034919",
              "#017106",
              '#901840',
              '#059103'
            ],
            hoverOffset: 4,
          },
        ],
      };
    
      const configPie = {
        type: "pie",
        data: dataPie,
        options: {
            plugins:{
                legend:{
                    display: true,
                    position:'bottom',
                    labels:{
                        boxWidth: 20,
                        boxHeight: 7
                    }
                }
            }
        },
      };
    
      var chartBar = new Chart(document.getElementById("totalVotesVoters"), configPie);
}
// total votes per department
function OGEVotesPerDept(departments,dataSet){
    const dataPie = {
        labels: departments,
        datasets: [
          {
            label: "My First Dataset",
            data: dataSet,
            backgroundColor: [
                "#ea5545", 
                "#f46a9b",
                "#ef9b20", 
                "#edbf33",
                "#ede15b", 
                "#bdcf32",
                "#87bc45", 
                "#27aeef",
                "#b33dc6",
                "#017106",
            ],
            hoverOffset: 4,
          },
        ],
      };
    
      const configPie = {
        type: "pie",
        data: dataPie,
        options: {
            plugins:{
                legend:{
                    display: true,
                    position:'bottom',
                    labels:{
                        boxWidth: 20,
                        boxHeight: 7
                    }
                }
            }
        },
      };
    
      var chartBar = new Chart(document.getElementById("totalVotesDepartment"), configPie);
}