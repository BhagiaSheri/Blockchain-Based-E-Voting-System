<!--for pie and bar chart-->
<script src="../../assets/lib/jquery.min.js"></script>
<script src="../../assets/lib/chartjs/Chart.min.js" crossorigin="anonymous"></script>
<script src="../../assets/lib/chartjs/chartjs-plugin-labels.min.js"></script>

<!-- include web3j file reference for results-->
<script src="../../smart-contract/node_modules/web3/dist/web3.min.js"></script>

<!-- smart contract deployed address file -->
<?php
include_once("../../smart-contract/smart-contract-config.php");
?>

<script>
	let data = [];

	electionResult(); //get no. of votes of candidates

	// fetching no. of candidates from smart contract
	async function electionResult() {
		for (let i = 0; i < contra.getNumCandidate(); i++) {
			const response = await contra.candidates(i);
			data.push({
				'name': response[1],
				'no_of_votes': parseInt(response[3])
			});
		}

		console.log(data);

		// ********Use the data object to print the Charts******

		// Set new default font family and font color to mimic Bootstrap's default styling
		Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		Chart.defaults.global.defaultFontColor = '#292b2c';

		// array of candidates name 
		let candidates = [];
		// and no. of votes
		let votes = [];

		// data from candidates table columns
		for (let i in data) {
			candidates.push(data[i].name);
			votes.push(data[i].no_of_votes);
		}

		// setting the candidates for barchart w.r.t votes
		let barChartData = {
			labels: candidates,
			datasets: [{
				label: 'Candidates Votes',
				backgroundColor: 'rgba(46,56,83, 1)',
				borderColor: 'rgba(46,56,86,0.75)',
				hoverBackgroundColor: 'rgba(46,56,83,0.5)',
				hoverBorderColor: 'rgba(46,56,83,0.5)',
				data: votes
			}]
		};

		// barchart view
		let bar = $("#myBarChart");
		let barGraph = new Chart(bar, {
			type: 'bar',
			data: barChartData,
			options: {
				scales: {
					xAxes: [{
						gridLines: {
							display: false
						},
					}],
				},
				plugins: {
					labels: {
						render: () => {}
					}
				}
			}
		});

		// setting dataset of pie chart w.r.t votes of candidates
		let pieChartData = {
			labels: candidates,
			datasets: [{
				label: 'Candidates',
				fill: true,
				lineTension: 2.1,
				backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
				data: votes
			}]
		};

		// pie chart view
		let pie = $("#myPieChart");
		let pieChart = new Chart(pie, {
			type: 'pie',
			data: pieChartData,
			options: {
				responsive: true,
				maintainAspectRatio: true,
				plugins: {
					labels: {
						render: 'percentage',
						fontColor: 'white',
					}
				},
			}
		});
	}
</script>