@extends('static.components.header')
@section('content')
    <div class="main-container">
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body bg1">
                    <h4 class="header-title text-white">Communities</h4>
                    <div class="testimonial-carousel owl-carousel">
                        <div class="tst-item">
                            <div class="tstu-img">
                                <a href="#"><img alt="svgImg"
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCI+CjxwYXRoIGZpbGw9IiMwMzliZTUiIGQ9Ik0yNCA1QTE5IDE5IDAgMSAwIDI0IDQzQTE5IDE5IDAgMSAwIDI0IDVaIj48L3BhdGg+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTI2LjU3MiwyOS4wMzZoNC45MTdsMC43NzItNC45OTVoLTUuNjl2LTIuNzNjMC0yLjA3NSwwLjY3OC0zLjkxNSwyLjYxOS0zLjkxNWgzLjExOXYtNC4zNTljLTAuNTQ4LTAuMDc0LTEuNzA3LTAuMjM2LTMuODk3LTAuMjM2Yy00LjU3MywwLTcuMjU0LDIuNDE1LTcuMjU0LDcuOTE3djMuMzIzaC00LjcwMXY0Ljk5NWg0LjcwMXYxMy43MjlDMjIuMDg5LDQyLjkwNSwyMy4wMzIsNDMsMjQsNDNjMC44NzUsMCwxLjcyOS0wLjA4LDIuNTcyLTAuMTk0VjI5LjAzNnoiPjwvcGF0aD4KPC9zdmc+" /></a>
                            </div>
                            <div class="tstu-content">
                                <h4 class="tstu-name">Facebook</h4>
                                <hr>
                                <p style="font-family: Khmer OS Siemreap;">
                                    ស្វែងយល់ពីឱកាសរៀនតាមអ៊ីនធឺណិតជាច្រើនតាមរយៈក្រុមអប់រំដ៏សកម្មរបស់ Facebook
                                    ដែលអាចភ្ជាប់ជាមួយអ្នករៀន និងអ្នកអប់រំនៅទូទាំងពិភពលោក។</p>
                            </div>
                        </div>
                        <div class="tst-item">
                            <div class="tstu-img">
                                <a href="#"><img alt="svgImg"
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCI+CjxwYXRoIGZpbGw9IiNGRjNEMDAiIGQ9Ik00My4yLDMzLjljLTAuNCwyLjEtMi4xLDMuNy00LjIsNGMtMy4zLDAuNS04LjgsMS4xLTE1LDEuMWMtNi4xLDAtMTEuNi0wLjYtMTUtMS4xYy0yLjEtMC4zLTMuOC0xLjktNC4yLTRDNC40LDMxLjYsNCwyOC4yLDQsMjRjMC00LjIsMC40LTcuNiwwLjgtOS45YzAuNC0yLjEsMi4xLTMuNyw0LjItNEMxMi4zLDkuNiwxNy44LDksMjQsOWM2LjIsMCwxMS42LDAuNiwxNSwxLjFjMi4xLDAuMywzLjgsMS45LDQuMiw0YzAuNCwyLjMsMC45LDUuNywwLjksOS45QzQ0LDI4LjIsNDMuNiwzMS42LDQzLjIsMzMuOXoiPjwvcGF0aD48cGF0aCBmaWxsPSIjRkZGIiBkPSJNMjAgMzFMMjAgMTcgMzIgMjR6Ij48L3BhdGg+Cjwvc3ZnPg==" /></a>
                            </div>
                            <div class="tstu-content">
                                <h4 class="tstu-name">YouTube</h4>
                                <hr>
                                <p style="font-family: Khmer OS Siemreap;">សូមចូលទៅក្នុងតម្កល់វត្ថុធាតុដ៏ធំមួយនៃវគ្គសិក្សា
                                    និងវគ្គសិក្សាអេឡិចត្រូនិចនៅលើ YouTube ដែលផ្តល់ជូននូវចំណាប់អារម្មណ៍ និងកម្រិតជំនាញផ្សេងៗ
                                </p>
                            </div>
                        </div>
                        <div class="tst-item">
                            <div class="tstu-img">
                                <a href="#"><img alt="svgImg"
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCI+CjxwYXRoIGZpbGw9IiMyOWI2ZjYiIGQ9Ik0yNCA0QTIwIDIwIDAgMSAwIDI0IDQ0QTIwIDIwIDAgMSAwIDI0IDRaIj48L3BhdGg+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTMzLjk1LDE1bC0zLjc0NiwxOS4xMjZjMCwwLTAuMTYxLDAuODc0LTEuMjQ1LDAuODc0Yy0wLjU3NiwwLTAuODczLTAuMjc0LTAuODczLTAuMjc0bC04LjExNC02LjczMyBsLTMuOTctMi4wMDFsLTUuMDk1LTEuMzU1YzAsMC0wLjkwNy0wLjI2Mi0wLjkwNy0xLjAxMmMwLTAuNjI1LDAuOTMzLTAuOTIzLDAuOTMzLTAuOTIzbDIxLjMxNi04LjQ2OCBjLTAuMDAxLTAuMDAxLDAuNjUxLTAuMjM1LDEuMTI2LTAuMjM0QzMzLjY2NywxNCwzNCwxNC4xMjUsMzQsMTQuNUMzNCwxNC43NSwzMy45NSwxNSwzMy45NSwxNXoiPjwvcGF0aD48cGF0aCBmaWxsPSIjYjBiZWM1IiBkPSJNMjMsMzAuNTA1bC0zLjQyNiwzLjM3NGMwLDAtMC4xNDksMC4xMTUtMC4zNDgsMC4xMmMtMC4wNjksMC4wMDItMC4xNDMtMC4wMDktMC4yMTktMC4wNDMgbDAuOTY0LTUuOTY1TDIzLDMwLjUwNXoiPjwvcGF0aD48cGF0aCBmaWxsPSIjY2ZkOGRjIiBkPSJNMjkuODk3LDE4LjE5NmMtMC4xNjktMC4yMi0wLjQ4MS0wLjI2LTAuNzAxLTAuMDkzTDE2LDI2YzAsMCwyLjEwNiw1Ljg5MiwyLjQyNyw2LjkxMiBjMC4zMjIsMS4wMjEsMC41OCwxLjA0NSwwLjU4LDEuMDQ1bDAuOTY0LTUuOTY1bDkuODMyLTkuMDk2QzMwLjAyMywxOC43MjksMzAuMDY0LDE4LjQxNiwyOS44OTcsMTguMTk2eiI+PC9wYXRoPgo8L3N2Zz4=" /></a>
                            </div>
                            <div class="tstu-content">
                                <h4 class="tstu-name">Telegram</h4>
                                <hr>
                                <p style="font-family: Khmer OS Siemreap;">ចូលរួមក្នុងកិច្ចពិភាក្សា
                                    និងការចែករំលែកចំណេះដឹងយ៉ាងសកម្មនៅលើបណ្តាញ e-learning ដែលមានភាពសកម្មរបស់ Telegram
                                    ដើម្បីលើកកម្ពស់បទពិសោធន៍នៃការរៀនសូត្រដោយសហការគ្នា។
                                </p>
                            </div>
                        </div>
                        <div class="tst-item">
                            <div class="tstu-img">
                                <a href="#"><img alt="svgImg"
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj4KPGNpcmNsZSBjeD0iMTMiIGN5PSIyOSIgcj0iMiIgZmlsbD0iI2VlM2U1NCI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iNzciIGN5PSIxMyIgcj0iMSIgZmlsbD0iI2YxYmMxOSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iNTAiIGN5PSI1MCIgcj0iMzciIGZpbGw9IiNmY2UwYTIiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjgzIiBjeT0iMTUiIHI9IjQiIGZpbGw9IiNmMWJjMTkiPjwvY2lyY2xlPjxjaXJjbGUgY3g9Ijg3IiBjeT0iMjQiIHI9IjIiIGZpbGw9IiNlZTNlNTQiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjgxIiBjeT0iNzYiIHI9IjIiIGZpbGw9IiNmYmNkNTkiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjE1IiBjeT0iNjMiIHI9IjQiIGZpbGw9IiNmYmNkNTkiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjI1IiBjeT0iODciIHI9IjIiIGZpbGw9IiNlZTNlNTQiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjE4LjUiIGN5PSI1My41IiByPSIyLjUiIGZpbGw9IiNmZmYiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjIxIiBjeT0iNjciIHI9IjEiIGZpbGw9IiNmMWJjMTkiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjgwIiBjeT0iMzQiIHI9IjEiIGZpbGw9IiNmZmYiPjwvY2lyY2xlPjxnPjxwYXRoIGZpbGw9IiM0NzJiMjkiIGQ9Ik0zNi40MzcsNzIuM2MtNC44MTcsMC04LjczNy0zLjkyLTguNzM3LTguNzM3VjM2LjQzOGMwLTQuODE3LDMuOTItOC43MzcsOC43MzctOC43MzdoMjcuMTI1IGM0LjgxNywwLDguNzM3LDMuOTIsOC43MzcsOC43Mzd2MjcuMTI1YzAsNC44MTctMy45Miw4LjczNy04LjczNyw4LjczN0gzNi40Mzd6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzQ3MmIyOSIgZD0iTTYzLjU2MiwyOC40YzQuNDMyLDAsOC4wMzcsMy42MDYsOC4wMzcsOC4wMzd2MjcuMTI1YzAsNC40MzItMy42MDYsOC4wMzctOC4wMzcsOC4wMzdIMzYuNDM3IGMtNC40MzIsMC04LjAzNy0zLjYwNi04LjAzNy04LjAzN1YzNi40MzhjMC00LjQzMiwzLjYwNi04LjAzNyw4LjAzNy04LjAzN0g2My41NjIgTTYzLjU2MiwyN0gzNi40MzcgQzMxLjI0NywyNywyNywzMS4yNDcsMjcsMzYuNDM4djI3LjEyNUMyNyw2OC43NTMsMzEuMjQ3LDczLDM2LjQzNyw3M2gyNy4xMjVDNjguNzUzLDczLDczLDY4Ljc1Myw3Myw2My41NjNWMzYuNDM4IEM3MywzMS4yNDcsNjguNzUzLDI3LDYzLjU2MiwyN0w2My41NjIsMjd6Ij48L3BhdGg+PC9nPjxnPjxwYXRoIGZpbGw9IiNlZTNlNTQiIGQ9Ik02Niw0M2MwLDAtNywwLTgtOGgtNnYxNC4wMjRWNTZsLTAuMDUsM2MtMC4yNTIsMi4yNDctMi4xMzYsNC00LjQ1LDRjLTIuNDg1LDAtNC41LTIuMDE1LTQuNS00LjUgczIuMDE1LTQuNSw0LjUtNC41YzAuMTcxLDAsMC4zMzQsMC4wMzIsMC41LDAuMDV2LTYuMDI1QzQ3LjgzMyw0OC4wMTcsNDcuNjY5LDQ4LDQ3LjUsNDhDNDEuNzAxLDQ4LDM3LDUyLjcwMSwzNyw1OC41IEMzNyw2NC4yOTksNDEuNzAxLDY5LDQ3LjUsNjljNS42MywwLDEwLjIxMi00LjQzNSwxMC40NzUtMTBINThWNDYuMjRjMS45OCwxLjYyMyw0LjU4NCwyLjc2LDgsMi43NkM2Niw0Nyw2Niw0Myw2Niw0M3oiPjwvcGF0aD48L2c+PGc+PHBhdGggZmlsbD0iIzQ3MmIyOSIgZD0iTTU4LDU3Yy0wLjEzOCwwLTAuMjUtMC4xMTItMC4yNS0wLjI1di04LjYyNWMwLTAuMTM4LDAuMTEyLTAuMjUsMC4yNS0wLjI1czAuMjUsMC4xMTIsMC4yNSwwLjI1IHY4LjYyNUM1OC4yNSw1Ni44ODgsNTguMTM4LDU3LDU4LDU3eiI+PC9wYXRoPjwvZz48Zz48cGF0aCBmaWxsPSIjNDcyYjI5IiBkPSJNNDcuNSw2OS4yNWMtMC43OTksMC0xLjU5NS0wLjA4OC0yLjM2Ni0wLjI2MWMtMC4xMzUtMC4wMy0wLjIyLTAuMTY0LTAuMTg5LTAuMjk5IGMwLjAzLTAuMTM0LDAuMTU5LTAuMjIxLDAuMjk5LTAuMTg5YzEuNDY4LDAuMzI5LDMuMDM4LDAuMzMxLDQuNSwwLjAwMmMwLjMyNC0wLjA3MSwwLjY0Ny0wLjE2LDAuOTYzLTAuMjY1IGMwLjM5OC0wLjEzMiwwLjc4OC0wLjI4OCwxLjE1Ny0wLjQ2M2MzLjQzOC0xLjYyNCw1LjY4My00Ljk5MSw1Ljg2MS04Ljc4N2MwLjAwNy0wLjEzNCwwLjExNi0wLjIzOCwwLjI1LTAuMjM4IGMwLjEzOCwwLDAuMjYzLDAuMTEyLDAuMjYzLDAuMjVjMCwwLjAzNC0wLjAwNiwwLjA2Ni0wLjAxOCwwLjA5N2MtMC4yMTYsMy45NDYtMi41NjMsNy40MzktNi4xNDMsOS4xMyBjLTAuMzg4LDAuMTg1LTAuNzk2LDAuMzQ4LTEuMjE1LDAuNDg2Yy0wLjMzMSwwLjEwOS0wLjY3MSwwLjIwMy0xLjAxMSwwLjI3OEM0OS4wODcsNjkuMTYzLDQ4LjI5Niw2OS4yNSw0Ny41LDY5LjI1eiI+PC9wYXRoPjwvZz48Zz48cGF0aCBmaWxsPSIjNDcyYjI5IiBkPSJNNDMuMzU0LDU2Ljk5OGMtMC4wMzIsMC0wLjA2NS0wLjAwNi0wLjA5OC0wLjAyYy0wLjEyNy0wLjA1NC0wLjE4Ny0wLjIwMS0wLjEzMy0wLjMyOCBjMC43NDYtMS43NjIsMi40NjQtMi45LDQuMzc3LTIuOWMwLjA4NSwwLDAuMTY4LDAuMDA3LDAuMjUsMC4wMTd2LTUuNzQxYzAtMC4xMzgsMC4xMTItMC4yNSwwLjI1LTAuMjVzMC4yNSwwLjExMiwwLjI1LDAuMjV2Ni4wMjUgYzAsMC4wNzEtMC4wMywwLjEzOS0wLjA4MywwLjE4N2MtMC4wNTQsMC4wNDctMC4xMjQsMC4wNjctMC4xOTQsMC4wNjJsLTAuMTU0LTAuMDJjLTAuMTA0LTAuMDE0LTAuMjEtMC4wMjktMC4zMTgtMC4wMjkgYy0xLjcxMiwwLTMuMjQ5LDEuMDE5LTMuOTE2LDIuNTk2QzQzLjU0Myw1Ni45NCw0My40NTEsNTYuOTk4LDQzLjM1NCw1Ni45OTh6Ij48L3BhdGg+PC9nPjxnPjxwYXRoIGZpbGw9IiM0NzJiMjkiIGQ9Ik02Niw0OS4yNWMtMS40NSwwLTIuODMxLTAuMjA1LTQuMTA2LTAuNjA5Yy0wLjEzMi0wLjA0Mi0wLjIwNS0wLjE4My0wLjE2My0wLjMxMyBjMC4wNDItMC4xMzIsMC4xODctMC4yMDUsMC4zMTMtMC4xNjNjMS4xNTMsMC4zNjUsMi4zOTksMC41NjIsMy43MDYsMC41ODRWNDMuMjRjLTAuNjYtMC4wNDQtMi41MDUtMC4yNzctNC4yODgtMS41MDMgYy0wLjExNC0wLjA3OC0wLjE0My0wLjIzNC0wLjA2NC0wLjM0OGMwLjA3OS0wLjExMywwLjIzNi0wLjE0MSwwLjM0OC0wLjA2NGMyLjA0OCwxLjQwOCw0LjIzMywxLjQyNSw0LjI1NSwxLjQyNSBjMC4xMzgsMCwwLjI1LDAuMTEyLDAuMjUsMC4yNXY2QzY2LjI1LDQ5LjEzOCw2Ni4xMzgsNDkuMjUsNjYsNDkuMjV6Ij48L3BhdGg+PC9nPjxnPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik00NS41LDY3LjVjLTYuMDY1LDAtMTEtNC45MzUtMTEtMTFzNC45MzUtMTEsMTEtMTFjMC4xMiwwLDAuMjM3LDAuMDA4LDAuMzU1LDAuMDE2bDAuMTY4LDAuMDExIGMwLjI2NywwLjAxMiwwLjQ3NywwLjIzMiwwLjQ3NywwLjQ5OXY2LjAyNWMwLDAuMTQzLTAuMDYxLDAuMjc3LTAuMTY3LDAuMzczYy0wLjA5MiwwLjA4Mi0wLjIxMSwwLjEyNy0wLjMzMywwLjEyNyBjLTAuMDE5LDAtMC4yMTYtMC4wMjMtMC4yMTYtMC4wMjNDNDUuNjksNTIuNTE1LDQ1LjU5Nyw1Mi41LDQ1LjUsNTIuNWMtMi4yMDYsMC00LDEuNzk0LTQsNHMxLjc5NCw0LDQsNCBjMi4wMjYsMCwzLjcyNi0xLjUyOCwzLjk1Mi0zLjU1NmwwLjA0OC0yLjk1M1YzM2MwLTAuMjc2LDAuMjI0LTAuNSwwLjUtMC41aDZjMC4yNTIsMCwwLjQ2NSwwLjE4OCwwLjQ5NiwwLjQzOCBjMC45MzIsNy40NSw3LjIzNyw3LjU2Miw3LjUwNSw3LjU2M2MwLjI3NSwwLjAwMSwwLjQ5OSwwLjIyNSwwLjQ5OSwwLjV2NmMwLDAuMjc2LTAuMjI0LDAuNS0wLjUsMC41IGMtMi44MjgsMC01LjM0Ni0wLjc1OC03LjUtMi4yNTVWNTdjMCwwLjA2NC0wLjAxMywwLjEyNi0wLjAzNCwwLjE4NEM1Ni4xMDksNjIuOTgxLDUxLjMyMyw2Ny41LDQ1LjUsNjcuNXoiPjwvcGF0aD48cGF0aCBmaWxsPSIjNDcyYjI5IiBkPSJNNTYsMzNjMSw4LDgsOCw4LDhzMCw0LDAsNmMtMy40MTYsMC02LjAyLTEuMTM2LTgtMi43NlY1N2gtMC4wMjVDNTUuNzEyLDYyLjU2NSw1MS4xMyw2Nyw0NS41LDY3IEMzOS43MDEsNjcsMzUsNjIuMjk5LDM1LDU2LjVDMzUsNTAuNzAxLDM5LjcwMSw0Niw0NS41LDQ2YzAuMTY5LDAsMC4zMzMsMC4wMTcsMC41LDAuMDI1djYuMDI1QzQ1LjgzNCw1Mi4wMzIsNDUuNjcxLDUyLDQ1LjUsNTIgYy0yLjQ4NSwwLTQuNSwyLjAxNS00LjUsNC41czIuMDE1LDQuNSw0LjUsNC41YzIuMzE0LDAsNC4xOTgtMS43NTMsNC40NS00TDUwLDU0di02Ljk3NlYzM0g1NiBNNTYsMzJoLTZjLTAuNTUyLDAtMSwwLjQ0OC0xLDEgdjE0LjAyNFY1NGwtMC4wNDksMi45MzNDNDguNzMyLDU4LjY4NSw0Ny4yNTcsNjAsNDUuNSw2MGMtMS45MywwLTMuNS0xLjU3LTMuNS0zLjVzMS41Ny0zLjUsMy41LTMuNSBjMC4wNzUsMCwwLjE0NywwLjAxMywwLjIxOSwwLjAyM2wwLjE2OSwwLjAyMmMwLjAzNywwLjAwNCwwLjA3NCwwLjAwNiwwLjExMSwwLjAwNmMwLjI0NSwwLDAuNDgyLTAuMDksMC42NjctMC4yNTUgQzQ2Ljg3OSw1Mi42MDYsNDcsNTIuMzM1LDQ3LDUyLjA1di02LjAyNWMwLTAuNTM0LTAuNDE5LTAuOTc0LTAuOTUzLTAuOTk5bC0wLjE1Ni0wLjAxQzQ1Ljc2MSw0NS4wMDgsNDUuNjMyLDQ1LDQ1LjUsNDUgQzM5LjE1OSw0NSwzNCw1MC4xNTksMzQsNTYuNVMzOS4xNTksNjgsNDUuNSw2OGM2LjA2OSwwLDExLjA2LTQuNjk1LDExLjQ2MS0xMC43MjlDNTYuOTg2LDU3LjE4NSw1Nyw1Ny4wOTQsNTcsNTdWNDYuMTYxIEM1OS4wNTcsNDcuMzgyLDYxLjQwMyw0OCw2NCw0OGMwLjU1MiwwLDEtMC40NDgsMS0xdi02YzAtMC41NTItMC40NDgtMS0xLTFjLTAuMjQ2LTAuMDAyLTYuMTM0LTAuMTMxLTcuMDA4LTcuMTI0IEM1Ni45MywzMi4zNzYsNTYuNTA0LDMyLDU2LDMyTDU2LDMyeiI+PC9wYXRoPjwvZz48Zz48cGF0aCBmaWxsPSIjODNjY2I3IiBkPSJNNjQsNDEuODkyQzY0LDQxLjM1Miw2NCw0MSw2NCw0MXMtMi42NDktMC4wMDctNC45MjEtMS44NzFDNjAuNjg3LDQxLjAzOSw2Mi43OCw0MS42ODMsNjQsNDEuODkyeiI+PC9wYXRoPjxwYXRoIGZpbGw9IiM4M2NjYjciIGQ9Ik00Mi44NjYsNjAuMTM0QzQzLjY4NCw2MS4yNiw0NS4wMDIsNjIsNDYuNSw2MmMyLjMxNCwwLDQuMTk4LTEuNzUzLDQuNDUtNEw1MSw1NXYtNi45NzZWMzRoNS4xODEgYy0wLjA2Ny0wLjMyNC0wLjEzNi0wLjY0NS0wLjE4MS0xaC02djE0LjAyNFY1NGwtMC4wNSwzYy0wLjI1MiwyLjI0Ny0yLjEzNiw0LTQuNDUsNEM0NC41MTMsNjEsNDMuNjA4LDYwLjY3Myw0Mi44NjYsNjAuMTM0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiM4M2NjYjciIGQ9Ik0zNiw1Ny41YzAtNS42Myw0LjQzNS0xMC4yMTIsMTAtMTAuNDc1di0xQzQ1LjgzMyw0Ni4wMTcsNDUuNjY5LDQ2LDQ1LjUsNDYgQzM5LjcwMSw0NiwzNSw1MC43MDEsMzUsNTYuNWMwLDMuMTU0LDEuMzk4LDUuOTc2LDMuNTk5LDcuOTAxQzM2Ljk4NSw2Mi41NTUsMzYsNjAuMTQ1LDM2LDU3LjV6Ij48L3BhdGg+PC9nPjxnPjxwYXRoIGZpbGw9IiM0NzJiMjkiIGQ9Ik01MSw0Ni4yNWMtMC4xMzgsMC0wLjI1LTAuMTEyLTAuMjUtMC4yNVYzNGMwLTAuMTM4LDAuMTEyLTAuMjUsMC4yNS0wLjI1aDUuMTgxIGMwLjEzOCwwLDAuMjUsMC4xMTIsMC4yNSwwLjI1cy0wLjExMiwwLjI1LTAuMjUsMC4yNUg1MS4yNVY0NkM1MS4yNSw0Ni4xMzgsNTEuMTM4LDQ2LjI1LDUxLDQ2LjI1eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiM0NzJiMjkiIGQ9Ik01MSw1NS4yNWMtMC4xMzgsMC0wLjI1LTAuMTEyLTAuMjUtMC4yNXYtNi45NzZjMC0wLjEzOCwwLjExMi0wLjI1LDAuMjUtMC4yNSBzMC4yNSwwLjExMiwwLjI1LDAuMjVWNTVDNTEuMjUsNTUuMTM4LDUxLjEzOCw1NS4yNSw1MSw1NS4yNXoiPjwvcGF0aD48cGF0aCBmaWxsPSIjNDcyYjI5IiBkPSJNNDYuNSw2Mi4yNWMtMC4xMzgsMC0wLjI1LTAuMTEyLTAuMjUtMC4yNXMwLjExMi0wLjI1LDAuMjUtMC4yNWMyLjE1NCwwLDMuOTYtMS42MjQsNC4yMDEtMy43NzcgbDAuMDIyLTEuNDM2YzAuMDAyLTAuMTM3LDAuMTE0LTAuMjQ2LDAuMjUtMC4yNDZjMC4wMDEsMCwwLjAwMywwLDAuMDA0LDBjMC4xMzksMC4wMDIsMC4yNDgsMC4xMTYsMC4yNDYsMC4yNTRsLTAuMDI0LDEuNDU5IEM1MC45MjksNjAuNDM1LDQ4LjkwOSw2Mi4yNSw0Ni41LDYyLjI1eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiM0NzJiMjkiIGQ9Ik00Mi4zNjcsNDguMTA3Yy0wLjA5NywwLTAuMTg5LTAuMDU3LTAuMjI5LTAuMTUxYy0wLjA1NS0wLjEyNywwLjAwNC0wLjI3NCwwLjEzMS0wLjMyOCBjMS4xODEtMC41MDUsMi40MzItMC43OTIsMy43Mi0wLjg1M2MwLjEyMSwwLjAxMywwLjI1NSwwLjEwMSwwLjI2MiwwLjIzOGMwLjAwNiwwLjEzOC0wLjEwMSwwLjI1NS0wLjIzOCwwLjI2MiBjLTEuMjI4LDAuMDU4LTIuNDIxLDAuMzMxLTMuNTQ2LDAuODEyQzQyLjQzNCw0OC4xMDEsNDIuNCw0OC4xMDcsNDIuMzY3LDQ4LjEwN3oiPjwvcGF0aD48cGF0aCBmaWxsPSIjNDcyYjI5IiBkPSJNMzYsNTcuNzVjLTAuMTM4LDAtMC4yNS0wLjExMi0wLjI1LTAuMjVjMC0zLjcxMywxLjg4MS03LjExMiw1LjAzLTkuMDkzIGMwLjExNi0wLjA3LDAuMjcxLTAuMDM5LDAuMzQ1LDAuMDc5YzAuMDczLDAuMTE2LDAuMDM4LDAuMjcxLTAuMDc5LDAuMzQ1Yy0zLjAwMywxLjg4OC00Ljc5Niw1LjEyOS00Ljc5Niw4LjY2OSBDMzYuMjUsNTcuNjM4LDM2LjEzOCw1Ny43NSwzNiw1Ny43NXoiPjwvcGF0aD48L2c+Cjwvc3ZnPg==" /></a>
                            </div>
                            <div class="tstu-content">
                                <h4 class="tstu-name">TikTok</h4>
                                <hr>
                                <p style="font-family: Khmer OS Siemreap;">
                                    សូមស្វែងយល់ពីវិធីសាស្រ្តនៃការរៀនសូត្រតាមអ៊ីនធឺណិតដែលមានភាពច្នៃប្រឌិត
                                    និងសញ្ញាបត្រឆាប់រហ័សនៅលើ TikTok ដែលធ្វើឱ្យការរៀនសូត្រមានភាពសប្បាយរីករាយ និងងាយស្រួល។
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-weight-bold">Featured Courses</h2>
            <a href="{{ url('category/1') }}" class="btn btn-link text-dark">View all →</a>
        </div>
        <div class="d-flex overflow-auto gap-3 p-4" style="overflow-x: auto;">
            @foreach ($randomCourses as $course)
                <div class="course border rounded p-2" style="width: 18rem; min-height: 300px;">
                    <a href="{{ url('/courses', ['course_id' => $course->course_id]) }}" class="d-block mb-2">
                        <img src="{{ asset('photos/courses/' . $course->course_thumbnail) }}"
                            alt="{{ $course->course_title }}" class="img-fluid rounded" style="height: 150px;">
                    </a>
                    <hr>
                    <h6 class="font-weight-bold mb-2">
                        <a href="{{ url('/courses', ['course_id' => $course->course_id]) }}" class="text-dark">
                            {{ Str::limit($course->course_title, 20) }}
                        </a>
                    </h6>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-text mb-0">
                            @php
                                $totalDiscountPrice = $course->getDiscountedPrice();
                            @endphp
                            @if ($totalDiscountPrice == 0.0)
                                <span class="badge badge-success text-light font-weight-light"><strong>Free</strong></span>
                            @else
                                <span
                                    class="badge badge-success text-light font-weight-light"><strong>{{ number_format($totalDiscountPrice, 2) }}</strong>$</span>
                                @if ($totalDiscountPrice != $course->course_price)
                                    <small class="text-secondary"><del>{{ $course->course_price }}$</del></small>
                                @endif
                            @endif
                        </h4>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <hr>
                <h1 style="font-family: AKbalthom KhmerNew;">សំណួរនិងចម្លើយ</h1>
                <hr>
            </div>
        </div>
        <div class="col-lg-12 mt-0" style="font-family: Khmer OS Siemreap;">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title" style="font-family: AKbalthom KhmerNew;">ខ្លឹមសារ :</h4>
                    <div id="accordion5" class="according accordion-s2 gradiant-bg">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#accordion51"
                                    style="font-family: Khmer OS Siemreap;">តើមានលក្ខណៈសម្បត្តិសំខាន់អ្វីខ្លះដែលត្រូវស្វែងរកនៅក្នុងវេទិកា
                                    eLearning?</a>
                            </div>
                            <div id="accordion51" class="collapse show" data-parent="#accordion5">
                                <div class="card-body">
                                    នៅពេលជ្រើសរើសវេទិកា eLearning វាជាការចាំបាច់ដើម្បីពិចារណាលក្ខណៈសម្បត្តិដូចជា
                                    user-friendly interface, customizable course content, interactive assessments,
                                    progress
                                    tracking, mobile compatibility,
                                    និងសមត្ថភាពក្នុងការរួមបញ្ចូលជាមួយប្រព័ន្ធផ្សេងទៀតដូចជា
                                    Learning Management Systems (LMS) ឬឧបករណ៍បង្កើតខ្លឹមសារ។
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#accordion52"
                                    style="font-family: Khmer OS Siemreap;">តើវេទិកា eLearning
                                    អាចជួយដល់អ្នករៀន និងអ្នកអប់រំយ៉ាងដូចម្តេច?</a>
                            </div>
                            <div id="accordion52" class="collapse" data-parent="#accordion5">
                                <div class="card-body">
                                    វេទិកា e-learning ផ្តល់ភាពស្វ័យប្រវត្តិ និងអាចចូលបាន
                                    ដោយអនុញ្ញាតឱ្យអ្នករៀនអាចចូលទៅរៀនវគ្គសិក្សាបានគ្រប់ពេលវេលាគ្រប់ទីកន្លែង។
                                    ពួកគេផ្តល់ឱ្យអ្នកអប់រំនូវឧបករណ៍ដើម្បីបង្កើតខ្លឹមសារដែលទាក់ទាញ,
                                    តាមដានភាពរីកចម្រើនរបស់សិស្ស និងជួយសម្រួលបទពិសោធន៍នៃការរៀនសូត្រដែលទាក់ទងគ្នា។
                                    លើសពីនេះទៅទៀត, វេទិកា eLearning អាចមានកម្រិតដើម្បីទទួលយកអ្នករៀនដែលខុសគ្នា
                                    និងបង្កើនលក្ខណៈងាយស្រួលក្នុងការគ្រប់គ្រងការងារសម្រាប់អ្នកអប់រំ។
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#accordion53"
                                    style="font-family: Khmer OS Siemreap;">តើមានបញ្ហាអ្វីខ្លះដែលពាក់ព័ន្ធនឹងការអនុវត្តវេទិកា
                                    eLearning?</a>
                            </div>
                            <div id="accordion53" class="collapse" data-parent="#accordion5">
                                <div class="card-body">
                                    ការប្រឈមមុខក្នុងការអនុវត្តវេទិកា eLearning
                                    រួមមានការធានានូវការភ្ជាប់អ៊ីនធឺណិតដែលអាចជឿទុកចិត្តបានសម្រាប់អ្នកប្រើប្រាស់ទាំងអស់,
                                    ការដោះស្រាយតម្រូវការនៃការអាចចូលបាន, ការថែរក្សាភាពឯកជននិងសុវត្ថិភាពនៃទិន្នន័យ,
                                    ការបណ្តុះបណ្តាលអ្នកអប់រំនិងអ្នករៀនដើម្បីប្រើប្រាស់វេទិកានេះយ៉ាងមានប្រសិទ្ធភាព,
                                    និងការគ្រប់គ្រងបញ្ហាបច្ចេកទេសដូចជាការផ្ទៀងផ្ទាត់ជាមួយឧបករណ៍និងកម្មវិធីផ្សេងៗ
                                    បន្ថែមពីនេះទៀត ការកែសម្រួលវិធីសាស្រ្តបង្រៀនប្រពៃណីទៅនឹងបរិយាកាសអនឡាញ
                                    និងការលើកកម្ពស់ការចូលរួម និងទំនាក់ទំនងរវាងអ្នករៀនអាចជាបញ្ហាប្រឈម។
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <style>
        .course img {

            transition: transform 0.2s;
        }

        .course img:hover {
            transform: scale(1.2);
        }

        .course {
            flex: 0 0 auto;
        }
    </style>
@endsection
