var ctx = document.getElementById('supplierChart');
var typesChart = new Chart(ctx, {
    type: 'doughnut',
    options: {
        title: {
            display: true,
            text: "Provenience of Suppliers' Products",
        },
        responsive: true,
        maintainAspectRatio: false,
    },
    data: {
        labels: ["Local/Regional", "National", "European", "American", "Asian"],
        datasets: [{
            label: "My first dataset",
            data: [50, 30, 10, 7, 3],
            borderColor:[
                "#3cba9f",
                "#ffa500",
                "#c45850",
                "#7a364e",
                "#0e5fc8",
            ],
            backgroundColor:[
                "rgb(60,186,159,0.5)",
                "rgb(255,165,0,0.4)",
                "rgb(196,88,80,0.3)",
                "rgb(122,54,78,0.4)",
                "rgb(14,95,200,0.5)",
            ],
            hoverOffSet: 3
        }]
    }
});
