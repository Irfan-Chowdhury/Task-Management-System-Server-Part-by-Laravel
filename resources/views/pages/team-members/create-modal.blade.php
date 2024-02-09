<!--Create Modal -->
<div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"> Add Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="submitForm" action="{{ route('team-members.store') }}">
                    @csrf
                    <div class="row">
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Member Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'placeholderData' => 'Ex: Admin',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Email',
                            'fieldType' => 'text',
                            'nameData' => 'email',
                            'placeholderData' => 'Ex: admin@gmail.com',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Employee Id',
                            'fieldType' => 'text',
                            'nameData' => 'employee_id',
                            'placeholderData' => 'Ex: BAL-12345',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Position',
                            'fieldType' => 'text',
                            'nameData' => 'position',
                            'placeholderData' => 'Ex: Software Engineer',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Password',
                            'fieldType' => 'password',
                            'nameData' => 'password',
                            'placeholderData' => '',
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Confirm Password',
                            'fieldType' => 'password',
                            'nameData' => 'password_confirmation',
                            'placeholderData' => '',
                            'isRequired' => true,
                        ])


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
