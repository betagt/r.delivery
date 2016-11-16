<script type="text/ng-template" id="product.html">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" ng-click="" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Atenção</h4>
        </div>
        <div class="modal-body">
            @{{ message.data }}
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary btn-flat btn-sm" ng-click="cancel()">
                <i class="fa fa-close"></i> Fechar
            </button>
        </div>
    </div>
</script>