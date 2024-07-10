$(document).ready(function() {
    $('#table-users').DataTable();

    $('.btn-delete').on('click', function() {
        if (confirm('Are you sure you want to delete this account?')) {
            var userId = $(this).data('id');
            $.ajax({
                url: 'delete_user.php',
                type: 'POST',
                data: { user_id: userId },
                success: function(response) {
                    location.reload();
                },
                error: function(err) {
                    alert('Failed to delete user.');
                }
            });
        }
    });

    $('.btn-reset-password').on('click', function() {
        var userId = $(this).data('id');
        $('#reset_user_id').val(userId);
        $('#resetPasswordModal').modal('show');
    });
});