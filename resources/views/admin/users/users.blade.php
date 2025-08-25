@extends('admin.layouts.app')

@section('title', 'All Users - ' . config('app.name'))

@section('content')




    <!-- Modal -->
    <div class="modal fade" id="addUserModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="modal-title" class="modal-title fs-5">Add Users</h1>
                    <button onclick="showAddUserModal()" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" method="POST" onsubmit="addUser(event)">
                        @csrf
                        <input type="hidden" name="id" id="id" value="">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="userEmail" name="email" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="userRole" class="form-label">Role</label>
                                <select class="form-select" id="userRole" name="role" required>
                                    <option value="salesman" selected>Salesman</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="userPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="userPassword" name="password" required>
                            </div>
                            <div class="mb-3 col-md-6 align-self-end">
                                <button type="submit" id="submitBtn" class="btn btn-primary w-100">Add User</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Users</h4>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">All Users</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Add
                            User</button>

                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>S.No:</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->isNotEmpty())
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user?->name }}</td>
                                            <td>{{ $user?->email }}</td>
                                            <td>{{ $user?->phone }}</td>
                                            <td>{{ $user?->role }}</td>
                                            <td>
                                                <button onclick="handleEdit({{ $user->id }})"
                                                    class="btn btn-sm btn-info">
                                                    <i class="mdi mdi-pencil-outline"></i>
                                                </button>
                                                <button onclick="handleDelete({{ $user->id }})"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="mdi mdi-trash-can-outline"></i>
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div> <!-- container-fluid -->
@endsection

@section('script')
    <!-- Datatables js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

    <!-- dataTables.bootstrap5 -->
    <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

    <!-- buttons.colVis -->
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

    <!-- buttons.bootstrap5 -->
    <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>

    <!-- dataTables.keyTable -->
    <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script>

    <!-- dataTable.responsive -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <!-- dataTables.select -->
    <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="assets/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js"></script>

    <!-- Datatable Demo App Js -->
    <script src="assets/js/pages/datatable.init.js"></script>

    <script>
        function showAddUserModal() {
            var $modal = $("#addUserModal");
            var form = document.getElementById('addUserForm');
            form.reset();
            $modal.find('#userPassword').prop("required", true);
            $("#modal-title").text("Add User");
            $("#submitBtn").text("Add User");



        }

        // ADD USERS
        function addUser(e) {
            e.preventDefault(); // stops form from submitting

            var $modal = $("#addUserModal");
            var form = document.getElementById('addUserForm');
            var formData = new FormData(form);

            $.ajax({
                url: "{{ route('users.store') }}",
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                processData: false,
                contentType: false,
                success: function(response) {
                    $modal.modal('hide');

                    // var tbody = $('#responsive-datatable tbody');
                    // var tr = $('<tr/>');
                    // tr.append($('<td/>').text(response.user.name));
                    // tr.append($('<td/>').text(response.user.email));
                    // tr.append($('<td/>').text(response.user.role));
                    // tr.append($('<td/>').html('<button onclick="handleEdit(' + response.user.id +
                    //     ')" class="btn btn-sm btn-info">Edit</button>'));
                    // tbody.prepend(tr);

                    form.reset();
                    location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                        let messages = Object.values(xhr.responseJSON.errors).flat().join('\n');
                        alert(messages);
                    } else {
                        alert('Error: ' + (xhr.responseJSON?.message || 'An error occurred.'));
                    }
                }
            });
        }

        // UPDATE USERS
        function handleEdit(id) {
            $('#addUserModal').modal('show');
            var $modal = $("#addUserModal");
            $modal.find("#id").val(id);
            $("#modal-title").text("Edit User");
            $("#submitBtn").text("Update User");
            $.ajax({
                url: "/users/" + id,
                success: function(response) {
                    if (response.success) {
                        let user = response?.data;
                        $modal.find('#name').val(user?.name);
                        $modal.find('#userEmail').val(user?.email);
                        $modal.find('#userRole').val(user?.role);
                        $modal.find('#phone').val(user?.phone);
                        $modal.find('#userPassword').val('');
                        $modal.find('#userPassword').prop("required", false);
                    }
                },
            })
        }

        // DELETE USERS
        function handleDelete(id) {
            let confirmed = confirm("Are you sure! You want to delete?");
            if (confirmed) {
                $.ajax({
                    url: "/users/" + id,
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                    },
                    success: (res) => {
                        if (res.success) {
                            alert("User Deleted.");
                            location.reload();

                        }
                    }
                })
            }
        }
    </script>

@endsection
