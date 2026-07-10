<div class="bg-white rounded-2xl shadow-md p-6 w-full">

    <h2 class="text-xl font-bold mb-5">

        Recent Activity

    </h2>

    @forelse($activities as $activity)

        <div class="flex items-center justify-between py-3 border-b">

            <div>

                <p class="font-medium">

                    {{ $activity->description }}

                </p>

                <small class="text-gray-500">

                    {{ $activity->created_at->diffForHumans() }}

                </small>

            </div>

        </div>

    @empty

        <p class="text-gray-400">

            No recent activity.

        </p>

    @endforelse

</div>