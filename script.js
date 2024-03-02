$(document).ready(function() {
    // Load users from XML file
    $.get('users.xml', function(data) {
        $(data).find('user').each(function() {
            var name = $(this).find('name').text();
            var quiz1 = $(this).find('quiz1').text();
            var quiz2 = $(this).find('quiz2').text();
            var quiz3 = $(this).find('quiz3').text();
            var quiz4 = $(this).find('quiz4').text();
            var quiz5 = $(this).find('quiz5').text();
            var average = $(this).find('average').text();
            var row = $('<tr><td>' + name + '</td><td>' + quiz1 + '</td><td>' + quiz2 + '</td><td>' + quiz3 + '</td><td>' + quiz4 + '</td><td>' + quiz5 + '</td><td>' + average + '</td><td><button class="delete-btn" data-name="' + name + '">Delete</button></td></tr>');
            $('#user-table tbody').append(row);
            row.find('.delete-btn').click(function() {
                var name = $(this).data('name');
                $(this).closest('tr').remove();
                $.ajax({
                    type: 'POST',
                    url: 'delete_user.php',
                    data: { name: name },
                    success: function(response) {
                        console.log('User deleted successfully!');
                    }
                });
            });
        });
    });

    // Add new user
    $('#add-user-form').submit(function(e) {
        e.preventDefault();
        var name = $('#name').val();
        var quiz1 = $('#quiz1').val();
        var quiz2 = $('#quiz2').val();
        var quiz3 = $('#quiz3').val();
        var quiz4 = $('#quiz4').val();
        var quiz5 = $('#quiz5').val();
        var average = (parseFloat(quiz1) + parseFloat(quiz2) + parseFloat(quiz3) + parseFloat(quiz4) + parseFloat(quiz5)) / 5;
        var row = $('<tr><td>' + name + '</td><td>' + quiz1 + '</td><td>' + quiz2 + '</td><td>' + quiz3 + '</td><td>' + quiz4 + '</td><td>' + quiz5 + '</td><td>' + average.toFixed(2) + '</td><td><button class="delete-btn" data-name="' + name + '">Delete</button></td></tr>');
        $('#user-table tbody').append(row);
        row.find('.delete-btn').click(function() {
            var name = $(this).data('name');
            $(this).closest('tr').remove();
            $.ajax({
                type: 'POST',
                url: 'delete_user.php',
                data: { name: name },
                success: function(response) {
                    console.log('User deleted successfully!');
                }
            });
        });
        $.ajax({
            type: 'POST',
            url: 'add_user.php',
            data: { name: name, quiz1: quiz1, quiz2: quiz2, quiz3: quiz3, quiz4: quiz4, quiz5: quiz5, average: average.toFixed(2) },
            success: function(response) {
                $('#name').val('');
                $('#quiz1').val('');
                $('#quiz2').val('');
                $('#quiz3').val('');
                $('#quiz4').val('');
                $('#quiz5').val('');

                alert("Success Added Record")
            }
        });
    });
});
