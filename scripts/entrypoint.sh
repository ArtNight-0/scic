# scripts/entrypoint.sh
#!/bin/bash

# Start cron
service cron start

# Tail the log file to keep container running and see the output
tail -f /var/log/cron.log