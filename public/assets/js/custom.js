$(function () {
    "use strict";

    $(document).on('change', '#date_of_birth', function(){
        const dobInput = document.getElementById('date_of_birth').value; // Get date from input
        if (!dobInput) {
            document.getElementById('age').value = ''; // Clear age field if no date
            return;
        }

        const birthDate = new Date(dobInput);
        const today = new Date();

        let years = today.getFullYear() - birthDate.getFullYear();
        let months = today.getMonth() - birthDate.getMonth();
        let days = today.getDate() - birthDate.getDate();

        // Adjust if the current day is earlier in the month than the birth day
        if (days < 0) {
            months--;
            days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
        }

        // Adjust if the current month is earlier than the birth month
        if (months < 0) {
            years--;
            months += 12;
        }

        // Display age in the format "X years, Y months, Z days"
        document.getElementById('age').value = `${years} years, ${months} months, ${days} days`;
    });

    $(document).on('change', '#edit_date_of_birth', function(){
        const dobInput = document.getElementById('edit_date_of_birth').value; // Get date from input
        if (!dobInput) {
            document.getElementById('edit_age').value = ''; // Clear age field if no date
            return;
        }

        const birthDate = new Date(dobInput);
        const today = new Date();

        let years = today.getFullYear() - birthDate.getFullYear();
        let months = today.getMonth() - birthDate.getMonth();
        let days = today.getDate() - birthDate.getDate();

        // Adjust if the current day is earlier in the month than the birth day
        if (days < 0) {
            months--;
            days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
        }

        // Adjust if the current month is earlier than the birth month
        if (months < 0) {
            years--;
            months += 12;
        }

        // Display age in the format "X years, Y months, Z days"
        document.getElementById('edit_age').value = `${years} years, ${months} months, ${days} days`;
    });

 

});