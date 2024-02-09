<!--Create Modal -->
<div class="modal fade bd-example-modal-lg" id="editModal-{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"> Edit Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="updateForm" action="{{ route('team-members.update', $member->id) }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $member->id }}">
                    
                    <div class="row">
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Member Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'valueData' => $member->name,
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Email',
                            'fieldType' => 'text',
                            'nameData' => 'email',
                            'valueData' => $member->email,
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Employee Id',
                            'fieldType' => 'text',
                            'nameData' => 'employee_id',
                            'valueData' => $member->employee_id,
                            'isRequired' => true,
                        ])
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Position',
                            'fieldType' => 'text',
                            'nameData' => 'position',
                            'valueData' => $member->position,
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


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
