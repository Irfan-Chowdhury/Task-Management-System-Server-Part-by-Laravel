<!--Create Modal -->
<div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"> Add Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="submitForm">

                    @csrf
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
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
