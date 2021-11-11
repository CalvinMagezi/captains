<div>
     <!-- Latest Orders Table -->
     <div class="w-full text-left">
         <h1 class="text-3xl font-bold py-3 mx-4">Recent Orders</h1>
     </div>
        <div class="mt-4 mx-4">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Order #</th>
                    <th class="px-4 py-3">Table #</th>
                    <th class="px-4 py-3">Taken By</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Created At</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  @forelse ($data as $item)
                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        {{ $item->id }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->table_number }}
                    </td>
                    <td class="px-4 py-3 text-xs">
                        {{ $item->taken_by }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->status }}
                    </td>
                     <td class="px-4 py-3 text-sm">
                        {{ $item->total_amount }}
                    </td>
                     <td class="px-4 py-3 text-sm">
                        {{ $item->created_at }}
                    </td>
                  </tr>
                  @empty
                      <tr>
                          <td colspan="6">
                              No Orders Today
                          </td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3"> Total Orders Today: {{ count($todays_orders) }}</span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
              <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                @if (count($data))
                    {{ $data->links() }}
                @endif
              </span>
            </div>
          </div>
        </div>
        <!-- ./Latest Orders Table -->
</div>
