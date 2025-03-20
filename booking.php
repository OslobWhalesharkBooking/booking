<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header-text {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 500px;
            text-align: left;
            position: relative;
        }
        .center-text {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .btn-full {
            width: 100%;
            margin-top: 10px;
        }
        .btn-back {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 14px;
            padding: 6px 10px;
        }
        select, input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            font-size: 16px;
        }
        .hidden {
            display: none;
        }
        .radio-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .radio-group input {
            margin-left: 10px;
        }
        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }
        .extra-spacing {
            margin-top: 30px;
        }
        .member-container {
            margin-top: 20px;
        }
        .member-list {
            margin-top: 10px;
        }
    </style>
    <script>
        function toggleMembersInput() {
            let noOption = document.getElementById("noOption");
            let membersSection = document.getElementById("membersSection");

            if (noOption.checked) {
                membersSection.classList.remove("hidden");
            } else {
                membersSection.classList.add("hidden");
                document.getElementById("membersList").innerHTML = "";
            }
        }

        function generateMemberFields() {
            let membersList = document.getElementById("membersList");
            let numMembers = document.getElementById("members").value;
            membersList.innerHTML = "";

            for (let i = 1; i <= numMembers; i++) {
                let div = document.createElement("div");
                div.classList.add("member-list");
                div.innerHTML = `<label>Member ${i} Nationality:</label>
                                 <input type="text" name="member_nationality_${i}" placeholder="Enter nationality of Member ${i}">`;
                membersList.appendChild(div);
            }
        }
    </script>
</head>
<body>

<!-- Header Text -->
<div class="header-text">Whale Shark Booking</div>

<?php $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); ?>

<div class="form-container">
    <a href="calendar.php" class="btn btn-back">← Back to Calendar</a>

    <!-- Centered Booking Form Title -->
    <div class="center-text">Booking Form</div>

    <!-- Centered Selected Date -->
    <div class="center-text"><strong>Selected Date:</strong> <?php echo date('F d, Y', strtotime($date)); ?></div>

    <label for="time">Choose Time:</label>
    <select id="time">
        <option>-- Select a Time --</option>
        <option>6:00 AM</option>
        <option>7:00 AM</option>
        <option>8:00 AM</option>
    </select>

    <div class="form-row extra-spacing">
        <label>Traveling Alone?</label>
        <div class="radio-group">
            <input type="radio" name="alone" value="yes" id="yesOption" onclick="toggleMembersInput()"> <label for="yesOption">Yes</label>
            <input type="radio" name="alone" value="no" id="noOption" onclick="toggleMembersInput()"> <label for="noOption">No</label>
        </div>
    </div>

    <div id="membersSection" class="hidden extra-spacing">
        <label for="members">Number of Members:</label>
        <input type="number" id="members" placeholder="Enter number of members" min="1" oninput="generateMemberFields()" class="member-container">
        <div id="membersList"></div>
    </div>

    <div class="extra-spacing">
        <label for="nationality">Your Nationality:</label>
        <input type="text" id="nationality" placeholder="Enter your nationality">
    </div>

    <button class="btn btn-full">Complete Booking</button>
</div>

</body>
</html>
