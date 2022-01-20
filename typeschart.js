var ctx = document.getElementById('typesChart');
var typesChart = new Chart(ctx, {
    type: 'pie',
    options: {
        title: {
            display: true,
            text: "Products by category",
        },
        responsive: true,
        maintainAspectRatio: false,
    },
    data: {
        labels: ["Food", "Beverages", "Healthcare", "Electronics", "Services"],
        datasets: [{
            label: "My first dataset",
            data: [30, 25, 10, 5, 12],
            borderColor:[
                "#3cba9f",
                "#ffa500",
                "#c45850",
                "#7a364e",
                "#0e5fc8",
            ],
            backgroundColor:[
                "rgb(60,186,159,0.2)",
                "rgb(255,165,0,0.2)",
                "rgb(196,88,80,0.2)",
                "rgb(122,54,78,0.2)",
                "rgb(14,95,200,0.2)",
            ],
            hoverOffSet: 4
        }]
    }
});
