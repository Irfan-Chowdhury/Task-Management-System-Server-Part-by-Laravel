<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> Edit Project </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" id="updateForm">
                    @csrf

                    <input type="hidden" name="project_id" id="modelId">

                    <div class="row">
                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Project Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'placeholderData' => 'Ex: PeoplePro HRM',
                            'isRequired' => true,
                        ])

                        @include('common-files.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Project Code',
                            'fieldType' => 'text',
                            'nameData' => 'code',
                            'placeholderData' => 'Ex: P-123',
                            'isRequired' => true,
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
