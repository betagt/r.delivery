<script type="text/ng-template" id="myModalContent.html">
    <div class="modal-header">
        <h3>Atenção</h3>
    </div>
    <div class="modal-body">
        @{{ message.data }}
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary btn-flat btn-sm" ng-click="cancel()">
            <i class="fa fa-close"></i> Fechar
        </button>
    </div>
</script>
