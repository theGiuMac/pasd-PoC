var ctx = document.getElementById('ordersChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            data: [12, 13, 13, 14, 22, 30, 20, 19, 24, 40, 40, 45],
            label: "Forecasted Orders",
            borderColor: "rgb(62,149,205)",
            backgroundColor: "rgb(62,149,205,0.1)",
        }, {
            data: [12, 15, 20, 22, 25, 40, 43, 40, 45, 60, 63, 49],
            label: "Actual Orders",
            borderColor: "rgb(60,186,159)",
            backgroundColor: "rgb(60,186,159,0.1)",
        }
                  ]
    },
    options: {
        title: {
            display: true,
            text: "Forecasted vs actual orders made to suppliers"
        },
        responsive: true,
        maintainAspectRatio: false,
    }
});
