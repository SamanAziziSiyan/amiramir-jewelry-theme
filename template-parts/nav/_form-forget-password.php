<!-- forget password form -->

<div id="ForgetPassword" class="hidden px-8">
    <div class="<?php echo $condition  ? 'text-white' : 'text-black'; ?> text-left mt-8 text-[18px]">
        <p>
            Please enter your email address below and click "Submit." We will send you an email that contains instructions on how to reset your password.
    </div>


    <div class="w-full mt-8 overflow-y-auto scrollbar-hide">
        <form id="ForgetPasswordForm" class="w-full flex flex-col" method="post">
            <div class="flex flex-col items-start gap-y-2 md:gap-y-4">
                <label class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Email</label>
                <div class="relative w-full " id="EmailIcon">

                    <input placeholder="Email" name="userEmail" value="" class="border p-2 md:p-4 bg-transparent w-full outline-none <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> " />
                    <div class=" absolute top-[10px] md:top-[18px] right-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <mask id="mask0_2599_5290" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_2599_5290)">
                                <path d="M4.46153 19C4.05191 19 3.70592 18.8588 3.42355 18.5764C3.14118 18.2941 3 17.9481 3 17.5385V6.46152C3 6.05191 3.14118 5.70592 3.42355 5.42355C3.70592 5.14118 4.05191 5 4.46153 5H19.5385C19.9481 5 20.2941 5.14118 20.5765 5.42355C20.8588 5.70592 21 6.05191 21 6.46152V17.5385C21 17.9481 20.8588 18.2941 20.5765 18.5764C20.2941 18.8588 19.9481 19 19.5385 19H4.46153ZM12 11.941L3.84615 6.53205V17.5385C3.84615 17.718 3.90384 17.8654 4.01923 17.9808C4.13461 18.0962 4.28204 18.1538 4.46153 18.1538H19.5385C19.718 18.1538 19.8654 18.0962 19.9808 17.9808C20.0962 17.8654 20.1539 17.718 20.1539 17.5385V6.53205L12 11.941ZM12 10.9795L19.818 5.84615H4.1987L12 10.9795ZM3.84615 6.53205V5.84615V17.5385C3.84615 17.718 3.90384 17.8654 4.01923 17.9808C4.13461 18.0962 4.28204 18.1538 4.46153 18.1538H3.84615V6.53205Z" fill="black" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <button title="SUBMIT" class="bg-[#004D29]  text-white text-center uppercase w-1/2 py-4 mt-8 md:mt-8">
                SUBMIT
            </button>
        </form>

    </div>
</div>