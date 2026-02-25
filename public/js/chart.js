import Chart from 'chart.js/auto';

const ctx = document.getElementById('Linegraph');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [{
        label: 'Sales',
        data: [20000, 30000, 45000, 30000, 32000, 20000, 33000, 40000, 35000, 32000, 23000, 40000, 60000],
        borderWidth: 1.3,
        borderColor: 'rgb(74, 183, 247)',
        backgroundColor: 'rgba(120, 121, 120, 0.3)',
        fill: true
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        legend: {
            position: 'bottom'
        }
      }
    }
  });