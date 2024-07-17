<!--Create Modal -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> Edit Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="updateForm">
                    @csrf
                    <input type="hidden" name="user_id" id="modelId">

                    <div class="row">
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Member Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'placeholderData' => 'Irfan Chy',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Email',
                            'fieldType' => 'text',
                            'nameData' => 'email',
                            'placeholderData' => 'irfan@gmail.com',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Employee Id',
                            'fieldType' => 'text',
                            'nameData' => 'employee_id',
                            'placeholderData' => 'L-123456',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Position',
                            'fieldType' => 'text',
                            'nameData' => 'position',
                            'placeholderData' => 'Software Engineer',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Password',
                            'fieldType' => 'password',
                            'nameData' => 'password',
                            'valueData' => null,
                            'isRequired' => false,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Confirm Password',
                            'fieldType' => 'password',
                            'nameData' => 'password_confirmation',
                            'placeholderData' => null,
                            'isRequired' => false,
                        ])

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
