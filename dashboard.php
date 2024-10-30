<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        #action-list {
            list-style-type: none;
            padding: 0;
        }
        #action-list li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Dashboard</h1>
    <ul id="action-list">Loading...</ul>
</div>

<script>
    async function fetchActions() {
        const response = await fetch('fetch_actions.php'); // Ensure this matches the file name
        const actions = await response.json();
        const actionList = document.getElementById('action-list');
        actionList.innerHTML = actions.map(action => `<li>${action.action} for ${action.item}</li>`).join('');
    }

    // Initial fetch of actions
    fetchActions();
</script>

</body>
</html>