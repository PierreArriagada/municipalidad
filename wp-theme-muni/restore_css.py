import json

transcript_path = '/home/pierre/.gemini/antigravity-ide/brain/ae091288-745b-4690-98a3-8c93f6075711/.system_generated/logs/transcript.jsonl'

edits = []

with open(transcript_path, 'r') as f:
    for line in f:
        try:
            data = json.loads(line)
            if 'tool_calls' in data:
                for call in data['tool_calls']:
                    if call['name'] == 'replace_file_content':
                        args = call['args']
                        target_file = args.get('TargetFile', '').strip('"')
                        if target_file.endswith('.css'):
                            edits.append({
                                'file': target_file,
                                'target': args.get('TargetContent', ''),
                                'replacement': args.get('ReplacementContent', '')
                            })
        except Exception as e:
            pass

for i, edit in enumerate(edits):
    print(f"--- EDIT {i} on {edit['file']} ---")
    print("TARGET:")
    print(edit['target'])
    print("REPLACEMENT:")
    print(edit['replacement'])
    print("\n")

