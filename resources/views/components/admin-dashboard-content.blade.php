<link rel="stylesheet" href="{{ asset('css/graph.css') }}">

<section class="content-area">
        <!-- Add your dynamic content here -->
        <div class="content-block">

    

    <div class="cards">
        <div class="card">Total Users: {{ $userCount }}</div>
        <div class="card">Total Product: {{ $productCount }}</div>
        <div class="card">Total Sales: {{ $salesCount }}</div>
    </div>

    <!-- Chart + Table Section -->
    <div class="card">
        <div class="card-header gradient-primary">
            <h5>Sales by Product (Top Products)</h5>
        </div>
        <div class="card-body">
            <div class="total-text">
                Total sales value shown: <span class="total-value">₱{{ $totalSalesOverall }}</span>
            </div>

            <div class="chart-container">
                <canvas id="productSalesChart"></canvas>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header gradient-info d-flex justify-content-between align-items-center">
            <h5>Products from Sales Records</h5>
            <span class="badge">{{ $products->count() }} products</span>
        </div>

        <div class="card-body table-section p-0">
            @if ($products->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">📦</div>
                    <p>No sales records found yet.</p>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th class="text-right">Qty Sold</th>
                            <th class="text-right">Avg Price</th>
                            <th class="text-right">Total Sales</th>
                            <th class="text-right">Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $product->productName }}</strong></td>
                                <td><span class="badge">{{ $product->category }}</span></td>
                                <td class="text-right">{{ number_format($product->total_quantity_sold) }}</td>
                                <td class="text-right">₱{{ $product->avg_price }}</td>
                                <td class="text-right text-success"><strong>₱{{ $product->total_sales_value }}</strong></td>
                                <td class="text-right">{{ $product->order_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="background:#f8fafc; font-weight:600;">
                        <tr>
                            <td colspan="5" class="text-right">Grand Total:</td>
                            <td class="text-right text-primary">
                                ₱{{ number_format($products->sum(fn($p) => (float) str_replace(',', '', $p->total_sales_value)), 2) }}
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            @endif
        </div>

        <div class="footer-note">
            Data from <code>sales</code> table • {{ now()->format('M d, Y h:i A') }}
        </div>
    </div>

</div>
          <!-- Simulate long content -->
          <div style="height: 1200px;"></div>
        </div>
</section>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('productSalesChart');
    const ctx = canvas.getContext('2d');

    const labels = @json($chartLabels ?? []);
    const data = @json($chartData ?? []);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Sales (₱)',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.65)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => '₱' + value.toLocaleString('en-PH')
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: ctx => ctx.dataset.label + ': ₱' + ctx.parsed.x.toLocaleString('en-PH')
                    }
                }
            }
        }
    });
});
</script>
@endpush

{{-- <script src="{{ asset('js/chart.js') }}"></script> --}}

