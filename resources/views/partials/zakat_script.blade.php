<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Zakat Calculator Logic
        const zakatInputs = ['gold', 'silver', 'cash', 'property'];
        const totalDisplay = document.getElementById('zakat-total');
        
        function calculateZakat() {
            let totalAssets = 0;
            zakatInputs.forEach(id => {
                const val = parseFloat(document.getElementById(id).value) || 0;
                totalAssets += val;
            });
            
            // Zakat is 2.5% of total assets
            const zakatAmount = totalAssets * 0.025;
            
            // Format with commas
            totalDisplay.innerText = new Intl.NumberFormat().format(Math.round(zakatAmount));
        }

        zakatInputs.forEach(id => {
            document.getElementById(id).addEventListener('input', calculateZakat);
        });
    });
</script>
