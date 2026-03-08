<main class="flex-1 overflow-y-auto p-8 bg-gray-50">
    <!-- Header -->
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-bank-navy  max-sm:text-[15px]">Reports & Analytics</h1>
            <p class="text-gray-500 text-sm mt-1">Comprehensive overview of platform performance and customer metrics.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2 max-sm:px-2 max-sm:py-1 max-sm:text-[10px] rounded-lg font-medium hover:bg-gray-50 transition-colors flex items-center gap-2">
                <i class="fa-solid fa-download"></i>
                <span>Export Data</span>
            </button>
            <button class="bg-bank-gold text-white px-4 py-2 max-sm:px-2 max-sm:py-1 max-sm:text-[10px] rounded-lg font-medium hover:bg-bank-gold/90 transition-colors flex items-center gap-2">
                <i class="fa-solid fa-print"></i>
                <span>Print Report</span>
            </button>
        </div>
    </div>

    <!-- Date Filter -->
    <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100 mb-8">
        <div class="flex flex-wrap items-center gap-4">
            <div class="flex items-center gap-2">
                <i class="fa-regular fa-calendar text-gray-400"></i>
                <span class="text-sm font-medium text-gray-700">Period:</span>
            </div>
            <select class="border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold text-sm">
                <option>Last 30 Days</option>
                <option>This Month</option>
                <option>Last Quarter</option>
                <option>Year to Date</option>
                <option>Custom Range</option>
            </select>
            <div class="h-6 w-px bg-gray-200 mx-2"></div>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">From:</span>
                <input type="date" class="border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold text-sm">
            </div>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">To:</span>
                <input type="date" class="border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold text-sm">
            </div>
            <button class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium text-sm hover:bg-bank-navy/90 transition-colors ml-auto">
                Update View
            </button>
        </div>
    </div>

    <!-- Key Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Customers -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Customers</p>
                    <h3 class="text-2xl font-bold text-bank-navy mt-1">12,450</h3>
                </div>
                <div class="p-2 bg-blue-50 rounded-lg text-blue-600">
                    <i class="fa-solid fa-users text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-arrow-up"></i> 5.2%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Active Accounts -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Active Accounts</p>
                    <h3 class="text-2xl font-bold text-bank-navy mt-1">15,320</h3>
                </div>
                <div class="p-2 bg-green-50 rounded-lg text-green-600">
                    <i class="fa-solid fa-wallet text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-arrow-up"></i> 3.8%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Transaction Volume -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Transaction Vol.</p>
                    <h3 class="text-2xl font-bold text-bank-navy mt-1">$4.2M</h3>
                </div>
                <div class="p-2 bg-purple-50 rounded-lg text-purple-600">
                    <i class="fa-solid fa-money-bill-transfer text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-red-600 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-arrow-down"></i> 1.2%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Support Tickets -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Open Tickets</p>
                    <h3 class="text-2xl font-bold text-bank-navy mt-1">28</h3>
                </div>
                <div class="p-2 bg-yellow-50 rounded-lg text-yellow-600">
                    <i class="fa-solid fa-headset text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-check"></i> 95%
                </span>
                <span class="text-gray-400 ml-2">resolution rate</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Main Chart -->
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-bank-navy">Transaction Status Overview</h3>
                <select class="text-xs border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>This Year</option>
                </select>
            </div>
            <div class="h-72 relative">
                <canvas id="transactionStatusChart"></canvas>
            </div>
        </div>

        <!-- Secondary Chart/List -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <h3 class="text-lg font-bold text-bank-navy mb-6">Status Distribution</h3>
            <div class="h-48 relative mb-6 flex justify-center">
                <canvas id="statusDistributionChart"></canvas>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span class="text-gray-600">Completed</span>
                    </div>
                    <span class="font-medium">65%</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <span class="text-gray-600">Pending</span>
                    </div>
                    <span class="font-medium">25%</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <span class="text-gray-600">Failed</span>
                    </div>
                    <span class="font-medium">10%</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx1 = document.getElementById('transactionStatusChart').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [
                        { label: 'Completed', data: [65, 59, 80, 81, 56, 55, 40], backgroundColor: '#22c55e', borderRadius: 4 },
                        { label: 'Pending', data: [28, 48, 40, 19, 86, 27, 90], backgroundColor: '#eab308', borderRadius: 4 },
                        { label: 'Failed', data: [10, 5, 15, 8, 12, 4, 9], backgroundColor: '#ef4444', borderRadius: 4 }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true, grid: { borderDash: [2, 4], color: '#f3f4f6' } }, x: { grid: { display: false } } },
                    plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } } }
                }
            });

            const ctx2 = document.getElementById('statusDistributionChart').getContext('2d');
            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Completed', 'Pending', 'Failed'],
                    datasets: [{
                        data: [65, 25, 10],
                        backgroundColor: ['#22c55e', '#eab308', '#ef4444'],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%',
                    plugins: { legend: { display: false } }
                }
            });
        });
    </script>

    <!-- Detailed Reports Table -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-bold text-bank-navy">Recent System Reports</h3>
            <div class="flex gap-2">
                <input type="text" placeholder="Search reports..." class="text-sm border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-medium">Report Name</th>
                        <th class="p-4 font-medium">Category</th>
                        <th class="p-4 font-medium">Generated Date</th>
                        <th class="p-4 font-medium">Status</th>
                        <th class="p-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-red-50 text-red-600 rounded">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </div>
                                <span class="font-medium text-bank-navy">Q3 Financial Summary</span>
                            </div>
                        </td>
                        <td class="p-4 text-gray-500">Financial</td>
                        <td class="p-4 text-gray-500">Oct 15, 2023</td>
                        <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">Ready</span></td>
                        <td class="p-4 text-right">
                            <button class="text-gray-400 hover:text-bank-navy mx-1"><i class="fa-solid fa-eye"></i></button>
                            <button class="text-gray-400 hover:text-bank-gold mx-1"><i class="fa-solid fa-download"></i></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-green-50 text-green-600 rounded">
                                    <i class="fa-solid fa-file-csv"></i>
                                </div>
                                <span class="font-medium text-bank-navy">Customer Acquisition Log</span>
                            </div>
                        </td>
                        <td class="p-4 text-gray-500">Marketing</td>
                        <td class="p-4 text-gray-500">Oct 14, 2023</td>
                        <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">Ready</span></td>
                        <td class="p-4 text-right">
                            <button class="text-gray-400 hover:text-bank-navy mx-1"><i class="fa-solid fa-eye"></i></button>
                            <button class="text-gray-400 hover:text-bank-gold mx-1"><i class="fa-solid fa-download"></i></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded">
                                    <i class="fa-solid fa-file-word"></i>
                                </div>
                                <span class="font-medium text-bank-navy">System Audit Trail</span>
                            </div>
                        </td>
                        <td class="p-4 text-gray-500">Security</td>
                        <td class="p-4 text-gray-500">Oct 12, 2023</td>
                        <td class="p-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-medium">Processing</span></td>
                        <td class="p-4 text-right">
                            <button class="text-gray-400 hover:text-bank-navy mx-1"><i class="fa-solid fa-eye"></i></button>
                            <button class="text-gray-400 hover:text-bank-gold mx-1"><i class="fa-solid fa-download"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
