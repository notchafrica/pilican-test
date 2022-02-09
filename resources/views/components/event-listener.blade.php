<script>
    window.addEventListener('productUpdated', event => {
    Livewire.components.getComponentsByName('stock.product.table')[0].$wire.$refresh()
    })

    window.addEventListener('categoryAdded', event => {
    Livewire.components.getComponentsByName('stock.category.category-table')[0].$wire.$refresh()
    })

</script>
