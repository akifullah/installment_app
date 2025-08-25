@extends('admin.layouts.app')

@section('title', 'All Customers - ' . config('app.name'))

@section('content')




    <!-- Modal -->
    <div class="modal fade" id="addCustomerModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="modal-title" class="modal-title fs-5">Add Customers</h1>
                    <button onclick="showaddCustomerModal()" type="button" class="btn-close" data-bs-dismiss="modal"
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
                                <label for="cnic" class="form-label">CNIC</label>
                                <input type="number" class="form-control" id="cnic" name="cnic" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="address" class="form-control" id="address" name="address">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="guarantor_name" class="form-label">Guarantor Name</label>
                                <input type="text" class="form-control" id="guarantor_name" name="guarantor_name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="guarantor_phone" class="form-label">Guarantor Phone</label>
                                <input type="text" class="form-control" id="guarantor_phone" name="guarantor_phone">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="guarantor_cnic" class="form-label">Guarantor CNIC</label>
                                <input type="number" class="form-control" id="guarantor_cnic" name="guarantor_cnic">
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
                <h4 class="fs-18 fw-semibold m-0">Customers</h4>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">All Customers</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Add
                            Customer</button>

                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>S.No:</th>
                                    <th>Name</th>
                                    <th>CNIC</th>
                                    <th>Phone</th>
                                    <th>Guarantor Name</th>
                                    <th>Guarantor Phone</th>
                                    <th>Guarantor CNIC</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($customers->isNotEmpty())
                                    @foreach ($customers as $key => $customer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $customer?->name }}</td>
                                            <td>{{ $customer?->cnic }}</td>
                                            <td>{{ $customer?->phone }}</td>
                                            <td>{{ $customer?->guarantor_name }}</td>
                                            <td>{{ $customer?->guarantor_phone }}</td>
                                            <td>{{ $customer?->guarantor_cnic }}</td>
                                            <td>
                                                <button onclick="handleEdit({{ $customer->id }})"
                                                    class="btn btn-sm btn-info">
                                                    <i class="mdi mdi-pencil-outline"></i>
                                                </button>
                                                <button onclick="handleDelete({{ $customer->id }})"
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
        function showaddCustomerModal() {
            var $modal = $("#addCustomerModal");
            var form = document.getElementById('addUserForm');
            form.reset();
            $modal.find('#userPassword').prop("required", true);
            $("#modal-title").text("Add Customer");
            $("#submitBtn").text("Add Customer");



        }

        // ADD USERS
        function addUser(e) {
            e.preventDefault(); // stops form from submitting

            var $modal = $("#addCustomerModal");
            var form = document.getElementById('addUserForm');
            var formData = new FormData(form);


            $.ajax({
                url: "{{ route('customers.store') }}",
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
                    Swal.fire({
                        title: $("#id").val() ? "Customers Updated" : 'Customers Added!',
                        text: $("#id").val() ? 'The Customer has been updated successfully.' :
                            'The Customer has been created successfully.',
                        icon: 'success',
                        confirmButtonText: 'Close',
                        didClose: () => {
                            location.reload();
                        }
                    });
                    form.reset();
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
            $('#addCustomerModal').modal('show');
            var $modal = $("#addCustomerModal");
            $modal.find("#id").val(id);
            $("#modal-title").text("Edit Customer");
            $("#submitBtn").text("Update Customer");
            $.ajax({
                url: "/customers/" + id,
                success: function(response) {
                    if (response.success) {
                        let customer = response?.data;
                        $modal.find('#name').val(customer?.name);
                        $modal.find('#phone').val(customer?.phone);
                        $modal.find('#cnic').val(customer?.cnic);
                        $modal.find('#address').val(customer?.address);
                        $modal.find('#guarantor_name').val(customer?.guarantor_name);
                        $modal.find('#guarantor_phone').val(customer?.guarantor_phone);
                        $modal.find('#guarantor_cnic').val(customer?.guarantor_cnic);
                    }
                },
            })
        }

        // DELETE USERS
        function handleDelete(id) {
            let confirmed = confirm("Are you sure! You want to delete?");
            if (confirmed) {
                $.ajax({
                    url: "/customers/" + id,
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                    },
                    success: (res) => {
                        if (res.success) {
                            alert("Customer Deleted.");
                            location.reload();

                        }
                    }
                })
            }
        }
    </script>

@endsection
